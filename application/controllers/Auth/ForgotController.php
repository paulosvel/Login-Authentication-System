<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ForgotController extends CI_CONTROLLER
{

    public function index()
    {
        $this->load->view('auth/forgot.php');

    }

    public function send_email()
    {
        $email = $this->input->post('email');

        // Check if the email exists in the database
        $this->load->model('ForgotModel');
        $user = $this->ForgotModel->get_user_by_email($email);
        if (!$user) {
            // Display an error message
            $this->session->set_flashdata('error', 'Email not found');
            redirect('forgot');
        }

        // Generate a random token
        $token = bin2hex(random_bytes(16));

        // Save the token in the database
        $this->ForgotModel->save_reset_token($user->id, $token);

        // Send the reset link to the user's email
        $reset_link = base_url('reset_password?token=' . $token);
        $this->load->library('email');
        $this->email->from('paul2001vel@gmail.com');
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message('Click the following link to reset your password: ' . $reset_link);
        $this->email->send();

        // Display a success message
        $this->session->set_flashdata('success', 'Reset link sent to your email');
        redirect('login');
    }
    public function reset_password() {
        $token = $this->input->get('token');
    
        // Check if the token exists in the database
        $this->load->model('ForgotModel');
        $user = $this->ForgotModel->get_user_by_token($token);
        if (!$user) {
            // Display an error message
            $this->session->set_flashdata('error', 'Invalid or expired token');
            redirect('forgot');
        }
    
        // Display a form to enter the new password
        $data['token'] = $token;
        $this->load->view('auth/reset_password_form', $data);
    }

}






?>