<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateModel extends CI_Model {

    public function update_profile($user_id, $new_email,$new_first_name,$new_last_name, $new_password) {
        $this->db->where('id', $user_id);
        $data = array(
            'first_name' => $new_first_name,
            'last_name' => $new_last_name,
            'email' => $new_email,
            'password' => password_hash($new_password, PASSWORD_DEFAULT)
        );
        $this->db->update('users', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
?>