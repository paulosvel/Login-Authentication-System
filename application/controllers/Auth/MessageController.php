<?php
class MessageController extends CI_Controller {

    public function index(){
        $this->load->view('template/header');
        $this->load->view('auth/form');
    }
        public function create(){
            $this->load->helper(array('form'));
            $this->load->library(array('form_validation','session'));
            // $this->load->library('encryption');
            $this->load->model('MessageModel');
            // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
    
            $data['messages'] = $this->MessageModel->create();
    
            $this->form_validation->set_rules('body_text', 'body_text', 'required');
    
            if($this->form_validation->run() === FALSE){
                $this->load->view('template/header');
                $this->load->view('auth/form', $data);
            } else {
    
                // Set message
                $this->session->set_flashdata('status', 'Your message has been sent');
    
                redirect('create');
            }
        }
    
    
    
    
    
    }
    ?>