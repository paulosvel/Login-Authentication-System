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

public function messages()
{
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $this->load->model('CustomersModel');

    $user_id = $this->session->userdata('user_id');
    $first_name = $this->session->userdata('first_name');
    $selected_message_id = $this->input->get('selected_message_id');
    $data['messages'] = $this->CustomersModel->get_messages($user_id,$selected_message_id,$first_name);

    $this->load->view('template/headeradmin');
    $this->load->view('auth/customersmessages', $data);
}

public function customers()
{
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $this->load->model('CustomersModel');

    $user_id = $this->session->userdata('id');
    $first_name = $this->session->userdata('first_name');
    $selected_user_id = $this->input->get('selected_user_id');
    $data['users'] = $this->CustomersModel->customers($user_id,$selected_user_id,$first_name);

    $this->load->view('template/headeradmin');
    $this->load->view('auth/customers', $data);
}

public function areyousure(){
    $this->load->view('auth/areyousure');
}

public function delete_user() {
    $user_id = $this->input->post('user_id');
    $this->load->model('CustomersModel');
    $this->CustomersModel->delete_user($user_id);
    redirect('customers');
}

public function edit_user($user_id) {
    $this->load->library('form_validation');
    $this->load->model('CustomersModel');

    // Set validation rules
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == false) {
        $data['user'] = $this->CustomersModel->get_user($user_id);
        $this->load->view('auth/customers', $data);
    } else {
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Update user information in database
        $this->CustomersModel->edit_user($user_id, $first_name, $last_name, $email, $password);
        redirect(base_url('customers'));
    }
}

public function message_historyadmin(){
    $this->load->model('CustomersModel');

    $user_id = $this->session->userdata('user_id');
    $selected_message_id = $this->input->get('selected_message_id');
    $data['messages'] = $this->CustomersModel->get_messages($user_id,$selected_message_id);

    $this->load->view('template/headeradmin');
    $this->load->view('auth/historyadmin', $data);

}



}
?>
