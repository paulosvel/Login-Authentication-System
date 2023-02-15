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
  $this->load->helper(array('form','url'));
  $this->load->library('form_validation');
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
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
     );
     $register_user = new UserModel;
     $register_user -> registerUser($data);

      // send verification email
      $this->load->library('email');
      $config = array(
         'protocol' => 'smtp',
         'smtp_host' => 'your_smtp_host',
         'smtp_user' => 'your_smtp_username',
         'smtp_pass' => 'your_smtp_password',
         'smtp_port' => 'your_smtp_port',
         'mailtype' => 'html',
         'charset' => 'iso-8859-1'
      );

      
      
     $this -> load->view('auth/login.php');
   }
 
 
 
 
 
 }










}

?>