<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LoginController extends CI_CONTROLLER
{



  public function __construct()
  {
    parent::__construct();
    if ($this->session->has_userdata('logged_in')) {
      $this->session->set_flashdata('status', 'You are already logged in');
      redirect(base_url('userpage'));
    }
    $this->load->helper('form');
    $this->load->library('form_validation', 'email');
    $this->load->model('LoginModel');

  }
  public function index()
  {

    $this->load->view('auth/login.php');
    $this->load->view('template/header.php');
  }


  public function login()
  {
    $this->form_validation->set_rules('email', 'email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {

      // Get username
      $email = $this->input->post('email');
      // Get and encrypt the password
      $password = $this->input->post('password');

      // Login user
      $user_id = $this->LoginModel->login($email, $password);

      if ($user_id) {
        // Create session
        $user_data = array(
          'user_id' => $user_id,
          'username' => $email,
          'logged_in' => true
        );

        $this->session->set_userdata($user_data);

        // Set message
        if ($this->session->userdata('role_as') == '1') {
          $this->session->set_flashdata('status', 'You are now logged in');
          redirect(base_url('userpage'));
        } else {
          redirect(base_url('adminpage'));

        }
      } else {
        // Set message
        $this->session->set_flashdata('status', 'Login is invalid');

        redirect(base_url('login'));
      }
    }
  }


  public function forgot()
  {
    $this->load->view('auth/forgot.php');
    $this->load->view('template/header.php');
  }
}

?>