<?php
class MessageController extends CI_Controller {

    public function index(){
        $this->load->view('template/header');
        $this->load->view('auth/form');
    }
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('form');
    }
        public function create(){
            $this->form_validation->set_rules('body_text', 'Body Text', 'required');
            $this->load->model('MessageModel');
             // Check login
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('status', 'Message cannot be empty.');
                redirect('form');  
            } else {
                // Set message
                $data['messages'] = $this->MessageModel->create();
                $this->load->view('template/header');
                $this->load->view('auth/form', $data);
                $this->session->set_flashdata('status', 'Your message has been sent');
                redirect('form');
            }
        }
    }
    ?>