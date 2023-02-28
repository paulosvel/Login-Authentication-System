<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class AdminController extends CI_Controller
{

    public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('LoginModel');
}


public function index()
{
$user_id = $this->session->userdata('user_id');
$user_role = $this->LoginModel->get_user_role($user_id);
if ($user_role == '2') {
$this->load->view('template/headeradmin');
}
else{
    redirect('login');
}


}

}




?>
