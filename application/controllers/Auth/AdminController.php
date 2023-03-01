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
$this->load->view('auth/userpage');
}
else{
    redirect('login');
}


}

public function customers()
{
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $this->load->model('CustomersModel');

    // Get the user's messages
    $user_id = $this->session->userdata('user_id');
    $first_name = $this->session->userdata('first_name');
    $selected_message_id = $this->input->get('selected_message_id');
    $data['messages'] = $this->CustomersModel->get_messages($user_id,$selected_message_id,$first_name);

    $this->load->view('template/headeradmin');
    $this->load->view('auth/customers', $data);
}

}




?>
