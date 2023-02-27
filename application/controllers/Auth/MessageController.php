<?php
class MessageController extends CI_Controller
{

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('auth/form');
        $this->load->library('pagination');
    }
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('form');
    }
    public function create()
    {
        $this->form_validation->set_rules('body_text', 'Body Text', 'required');
        $this->load->model('MessageModel');
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        if ($this->form_validation->run() == FALSE) {
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


    public function message_history()
{
    // Check if the user is logged in
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    // Load the message model
    $this->load->model('MessageModel');

    // Get the user's messages
    $user_id = $this->session->userdata('user_id');
    $selected_message_id = $this->input->get('selected_message_id');
    $data['messages'] = $this->MessageModel->get_messages($user_id,$selected_message_id);

    // Load the view to display the message history
    $this->load->view('template/header');
    $this->load->view('auth/history', $data);
}
    // public function history($offset = 0)
    // {
    //     // $this->load->view('template/header');

    //     // Pagination Config	
    //     // $config['base_url'] = base_url() . 'history/index/';
    //     $config['total_rows'] = $this->db->count_all('messages');
    //     $config['per_page'] = 3;
    //     $config['uri_segment'] = 3;
    //     $config['attributes'] = array('class' => 'pagination-link');

    //     // Init Pagination
    //     $this->pagination->initialize($config);

    //     // $data['title'] = 'Latest Posts';

    //     $data['messages'] = $this->MessageModel->get_messages(FALSE, $config['per_page'], $offset);

    //     $this->load->view('auth/history');
    //     $this->load->library('pagination');
    // }
}
?>