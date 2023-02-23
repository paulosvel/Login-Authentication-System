<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class LoginController extends CI_CONTROLLER{



    public function __construct()
    {
    parent::__construct();
    if ($this->session->has_userdata('authenticated')){
      $this->session->set_flashdata('status','You are already logged in');
      redirect(base_url('userpage'));

    }
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('LoginModel');

    }
public function index()
{

    $this -> load->view('auth/login.php');
    $this->load->view('template/header.php');
}


public function login()
{
  $this->load->model('LoginModel');
$this->form_validation->set_rules('email','Email Address','required|valid_email');
$this->form_validation->set_rules('password','Password','required');
if ($this->form_validation->run()==FALSE)
{
$this->index();


}
else
{
  $this->load->model('LoginModel');
  $data = [
   'email'=> $this->input->post('email'),
   'password'=> $this->input->post('password')
  ];

   $result = $this->LoginModel->login($data);
   if($result != FALSE){
    $auth_userdetails = [
      'first_name' => $result->first_name,
      'last_name' => $result->last_name,
      'email' => $result->email,


    ];
      $this->session->set_userdata('authenticated','1');
      $this->session->set_userdata('auth_user',$auth_userdetails);
      $this->session->set_flashdata('status','Successful Login');
      redirect(base_url('userpage'));


   }
   else {

    $this->session->set_flashdata('status','Wrong Email or Password');
    redirect(base_url('login'));
   }



}


}


public function forgot() {
  $this->load->view('auth/forgot.php');
  $this->load->view('template/header.php');
}
}

?>