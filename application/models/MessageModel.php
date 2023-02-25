<?php
class MessageModel extends CI_Model{

    public function create(){


        $data = array(
            'body_text' => $this->input->post('body_text'),
            'created_at' => $this->input->post('created_at'),
            'user_id' => $this->session->userdata('user_id'),
        );

        return $this->db->insert('messages', $data);
    }

}