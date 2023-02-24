<?php
class UpdateModel extends CI_Model {

     public function update(){

        $user_id = $this->session->userdata('user_id');
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );

        $this->db->where('id', $user_id); 
        return $this->db->update('users', $data);
    }
  
}
?>
