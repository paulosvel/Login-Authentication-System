<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('form');
    }


    public function update(){
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'));
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status', 'There was an error updating your details. Please try again.');
            redirect('userpage');
        } else {
            $this->load->model('UpdateModel');
            $this->UpdateModel->update();

            // Set message
            $this->session->set_flashdata('status', 'Your Profile has been updated');
            redirect('userpage');
        }
    }
}
?>
