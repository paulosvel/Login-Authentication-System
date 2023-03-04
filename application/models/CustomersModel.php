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

    public function customers() {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    
    public function delete_user() {
        $user_id = $this->input->post('user_id');
        $this->db->where('id', $user_id);
        $this->db->delete('users');
      }

      public function get_user() {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    
    public function edit_user($user_id) {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password
            );
    
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
    
            redirect('customers');
    
        $data['user'] = $this->db->get_where('users', array('id' => $user_id))->row_array();
    }

    
}
?>