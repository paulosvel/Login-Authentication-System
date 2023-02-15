<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class RegisterController extends CI_Controller
{

 public function __construct()
 {
   parent::__construct();
  if ($this->session->has_userdata('authenticated')){
  $this->session->set_flashdata('status','You are already logged in');
  redirect(base_url('userpage'));

  }
  $this->load->helper(array('form','url','string'));
  $this->load->library('form_validation','email');
  $this->load->model('UserModel');

 }

 public function index()
 {
    $this -> load->view('auth/register.php');
    $this->load->view('template/header.php');
}

 public function register()
 {
     $this->form_validation->set_rules('first_name', 'First Name', 'required');
     $this->form_validation->set_rules('last_name', 'Last Name', 'required');
     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
     $this->form_validation->set_rules('password', 'Password', 'required');
     $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
 
     if ($this->form_validation->run() == FALSE) {
         $this->index();
     }
     else 
   {
      $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'verification_token' => bin2hex(random_bytes(15)),

     );

     $register_user = new UserModel;
     $newuser = $register_user -> registerUser($data);
    if($newuser){
      if($this->sendmail($data)){
        $this->session->set_flashdata('error','Check your inbox to verify your account!');
        redirect('register');
      }else{
        $this->session->set_flashdata('error','We cant send you an email right now try again');
      }

    
    }else{
      $this->session->set_flashdata('error','Something went wrong try again');
    }

     $this -> load->view('auth/login.php');
   }
 
 
 
 
 
 }

 public function sendmail($data){
      $config = array(
         'protocol' => 'smtp',
         'smtp_host' => 'smtp.sendgrid.net',
         'smtp_user' => 'trytodo',
         'smtp_pass' => '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',
         'smtp_port' => '25',
         'mailtype' => 'html',
         'charset' => 'iso-8859-1'
      );
      $message = "<strong>".$data['last_name']."</strong>".anchor('register/confirm'.$data('verification_token'),'Activate your account','');
      $this->load->library('email');
      $this->email->set_new("\r\n");
      $this->email->from('paulvel2001@gmail.com','trytodo');
      $this->email->to($data['email']);
      $this->email->subject('Verification Email');
      $this->email->message($message);
      $this->email->set_mailtype('html');
      if($this->email->send()){
        return true;
      }
      else {
        return false;
      }
 
}

public function verify_email($verification_token){

  $this->load->model('UserModel');
  $user = $this->UserModel->getUserByVerificationToken($verification_token);







}


}
?>