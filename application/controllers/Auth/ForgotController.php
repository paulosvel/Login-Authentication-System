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
    
        $this->load->model('ForgotModel');
        $user = $this->ForgotModel->get_user_by_email($email);
        if (!$user) {
            $this->session->set_flashdata('error', 'Email not found');
            redirect('forgot');
        }
    
        $token = bin2hex(random_bytes(16));
    
        $this->ForgotModel->save_reset_token($user->id, $token);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => 'apikey',
            'smtp_pass' => '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',
            'smtp_port' => '587',
            'smtp_crypto' => 'tls',
            'mailtype' => 'html'
         );
        $reset_link = base_url('forgot/reset_password?token=' . $token);
        $this->load->library('email', $config);
        $this->email->from('paul2001vel@gmail.com');
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message('Click the following link to reset your password: ' . $reset_link);
    
        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
        }
    
        $this->session->set_flashdata('success', 'Reset link sent to your email');
        redirect('login');
    }
    
    public function reset_password() {
        $token = $this->input->get('token');
    
        $this->load->model('ForgotModel');
        $user = $this->ForgotModel->get_user_by_token($token);
        if (!$user) {
            $this->session->set_flashdata('error', 'Invalid or expired token');
            redirect('forgot');
        }
    
        $data['token'] = $token;
        $this->load->view('auth/reset_password_form', $data);
    }

    public function update_password()
{
    $token = $this->input->post('token');
    $password = $this->input->post('password');
    $password2 = $this->input->post('password2');
    if ($password !== $password2) {
        $this->session->set_flashdata('error', 'Passwords do not match');
        redirect('reset_password?token=' . $token);
    }

    $this->load->model('ForgotModel');
    $user = $this->ForgotModel->get_user_by_token($token);
    if (!$user) {
        // Display an error message
        $this->session->set_flashdata('error', 'Invalid or expired token');
        redirect('forgot');
    }

    $this->load->model('ForgotModel');
    $this->ForgotModel->update_password($user->id, $password);

    // $this->ForgotModel->remove_reset_token($user->id);

    $this->session->set_flashdata('success', 'Password reset successfully');
    redirect('reset_password?token=' . $token);
}
    

}






?>