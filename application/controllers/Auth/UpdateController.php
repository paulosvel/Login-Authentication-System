<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateController extends CI_Controller {
    
    public function update() {
        $this->load->model('UpdateModel');
        $user_id = $this->session->userdata('user_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');



        $update_result = $this->UpdateModel->update($user_id,$email, $first_name, $last_name, $password);
        

        if ($update_result) {
            $this->session->set_flashdata('success_message', 'Your profile has been updated.');
        } else {
            $this->session->set_flashdata('error_message', 'Sorry, there was an error updating your profile.');
        }

        redirect('login');
    }

}
