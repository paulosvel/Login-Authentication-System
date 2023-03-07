<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class RegisterController extends CI_Controller
{

 public function __construct()
 {
   parent::__construct();
  if ($this->session->has_userdata('logged_in')){
  $this->session->set_flashdata('status','You are already logged in');
  redirect(base_url('userpage'));

  }
  $this->load->helper(array('form','url','string'));
  $this->load->library(array('form_validation','session','sendgrid','email'));
  $this->load->model('RegisterModel');

 }

 public function index()
 {
    $this -> load->view('auth/register.php');
    $this->load->view('template/header.php');
}

 public function register()
 {
     $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
     $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
     $this->form_validation->set_rules('password', 'Password', 'required');
     $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
 
     if ($this->form_validation->run() == FALSE) {
         $this->index();
     }
     else 
   {

      $verification_key = md5(rand());
      $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'email' => $this->input->post('email'),
      'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'verification_key'=> $verification_key

     );

     $register_user = new RegisterModel;
    //  $register_user -> registerUser($data);
     $id = $this->RegisterModel->registerUser($data);
     if ($id>0){
      $subject = "Please verify email for login";
      $message = "
      <p>Hi ".$this->input->post('last_name')."</p>
      <p>This is email verification mail from Trytodo Verification system. For complete registration process and login into system. First you want to verify you email by click this <a href='".base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
      <p>Once you click this link your email will be verified and you can login into system.</p>
      <p>Thanks</p>
      ";
     
     $config = array(
      'protocol' => 'smtp',
      'smtp_host' => 'smtp.sendgrid.net',
      'smtp_user' => 'your_username',
      'smtp_pass' => 'your_password',
      'smtp_port' => '587',
      'smtp_crypto' => 'tls',
      'mailtype' => 'html'
   );
   $this->load->library('email',$config);
   $this->email->set_newline("\r\n");
   $this->email->from('your-email-here');
   $this->email->to($this->input->post('email'));
   $this->email->subject($subject);
   $this->email->message($message);
   if($this->email->send()){
    $this->session->set_flashdata('message', 'Check in your email for email verification mail');
    redirect('register');
   }
   }
 }

 }
public function verify_email()
 {
  if($this->uri->segment(3))
  {
   $verification_key = $this->uri->segment(3);
   if($this->RegisterModel->verify_email(
    $verification_key))
   {
    $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url('').'login">here</a></h1>';
   }
   else
   {
    $data['message'] = '<h1 align="center">Invalid Link</h1>';
   }
   $this->load->view('email_verification', $data);
  }
 }

}


?>