<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UpdateController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UpdateModel');
        $this->load->library('session','form_validation');
        $this->load->helper('form');
    }
public function update()
{
    $this->form_validation->set_rules('first_name','First Name','required|trim');
    $this->form_validation->set_rules('last_name','Last Name','required|trim');
    $this->form_validation->set_rules('email','Email Address','required|trim|valid_email');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() == FALSE) {
        $data['title'] = 'Update';
        $this->session->set_flashdata('status', 'There was an error updating your details. Please try again.');
        redirect(base_url('userpage'));
    } else {
         $data = array(
            'first_name' => $this->input->post('first_name',true),
            'last_name' => $this->input->post('last_name',true),
            'email' => $this->input->post('email',true),
            'password' => $this->input->post('password',true)
            
         );
         $result = $this->UpdateModel->Update_User_Data($this->session->userdata('user_id'), $data);
         if ($result > 0)
         {
            $session_data = array(
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => $data['password']

            );
            $this->session->set_flashdata('success','User Profile Updated');
            return redirect('login');    

         } 
        else
        {
            $this->session->set_flashdata('error','User Profile Failed To Update');
            return redirect('login');
        }
    }
}
}
?>