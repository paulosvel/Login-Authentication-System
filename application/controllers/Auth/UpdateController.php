<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateController extends CI_Controller {

    public function update_profile() {
        // Load the model for user authentication
        $this->load->model('UpdateModel');

        // Retrieve the input data from the form
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Get the user ID from the session (assuming you have implemented user authentication)
        $user_id = $this->session->userdata('user_id');

        // Call the method in the model to update the user credentials in the database
        $update_result = $this->UpdateModel->update_profile($user_id,$first_name,$last_name, $email, $password);

        if ($update_result) {
            // If the update was successful, display a success message
            $this->session->set_flashdata('success_message', 'Your profile has been updated.');
        } else {
            // If the update failed, display an error message
            $this->session->set_flashdata('error_message', 'Sorry, there was an error updating your profile.');
        }

        // Redirect the user back to the page where the update form was located
        redirect('userpage');
    }

}
