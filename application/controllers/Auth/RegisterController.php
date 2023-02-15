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
  $this->load->library('form_validation','session','sendgrid');
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
      $verification_key = md5(rand());
      $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'verification_key'=> $verification_key

     );

     $register_user = new UserModel;
     $register_user -> registerUser($data);


     $this -> load->view('auth/login.php');
   }
 
 
 
 
 
 }

 public function sendEmail($data){
  $id = $this->user_model->insert($data);
  if($id>0){
  $subject = "Please verify email for login";
 $message = "
 <p>Hi ".$this->input->post('user_name')."</p>
 <p>This is email verification mail from Codeigniter Login Register system. For complete registration process and login into system. First you want to verify you email by click this <a href='".base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
 <p>Once you click this link your email will be verified and you can login into system.</p>
 <p>Thanks,</p>
 ";
  }
  $config = array(
     'protocol' => 'smtp',
     'smtp_host' => 'smtp.sendgrid.net',
     'smtp_user' => 'paulvel2001@gmail.com',
     'smtp_pass' => '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',
     'smtp_port' => '25',
     'smtp_crypto' => 'tls',
     'mailtype' => 'html',
     'charset' => 'UTF-8'
  );
  
  $this->load->library('email', $config);
  $this->email->set_newline("\r\n");
  $this->email->from('info@webslesson.info');
  $this->email->to($this->input->post('user_email'));
  $this->email->subject($subject);
  $this->email->message($message);
  if($this->email->send())
  {
   $this->session->set_flashdata('message', 'Check in your email for email verification mail');
   redirect('register');
  }

   
   else
  {
 $this->index();
  }

 }
function verify_email()
{
if($this->uri->segment(3))
{
 $verification_key = $this->uri->segment(3);
 if($this->user_model->verify_email($verification_key))
 {
  $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
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