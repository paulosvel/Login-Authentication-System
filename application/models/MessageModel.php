<?php
class MessageModel extends CI_Model{

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