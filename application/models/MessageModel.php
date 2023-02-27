<?php
class MessageModel extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_messages($user_id,$selected_message_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('messages');
        $messages = $query->result_array();
    
        // Set 'expanded' field based on some condition
        foreach ($messages as &$message) {
            $message['expanded'] = ($message['id'] === $selected_message_id);
            // Set 'expanded' to true if some condition is met
        }
    
        return $messages;
    }
    
    public function create(){
        $this->load->helper('date');
        $date = new DateTime('now', new DateTimeZone('GMT'));
        $date->setTimezone(new DateTimeZone('Europe/Athens'));
        $created_at = $date->format('Y-m-d H:i:s');


        $data = array(
            'body_text' => $this->input->post('body_text'),
            'created_at' => $created_at,
            'user_id' => $this->session->userdata('user_id'),
        );

        return $this->db->insert('messages', $data);
    }

}