<?php

class CustomersModel extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_messages($user_id, $selected_message_id) {
        $this->db->select('messages.*, users.first_name, users.last_name, users.email');
        $this->db->from('messages');
        $this->db->join('users', 'users.id = messages.user_id');
        $this->db->order_by('messages.created_at', 'desc');
        $query = $this->db->get();
    
        $messages = $query->result_array();
    
        // Set 'expanded' field based on some condition
        foreach ($messages as &$message) {
            $message['expanded'] = ($message['id'] === $selected_message_id);
        }
    
        return $messages;
    }

}