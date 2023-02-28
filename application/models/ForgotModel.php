<?php
class ForgotModel extends CI_Model {
    
    public function get_user_by_email($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row();
    }

    public function save_reset_token($user_id, $token) {
        $data = array(
            'reset_token' => $token,
            'reset_token_created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function get_user_by_token($token) {
        $this->db->select('id, email, reset_token_created_at');
        $this->db->from('users');
        $this->db->where('reset_token', $token);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $user = $query->row();

            $expires_at = strtotime($user->reset_token_created_at) + 3600; 
            if (time() <= $expires_at) {
                return $user;
            }
        }

        return FALSE;
    }

    public function update_password($user_id, $password) {
        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'reset_token' => NULL,
            'reset_token_created_at' => NULL,
        );
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

}
