<?php
class LoginModel extends CI_Model {


public function login($email, $password) {
    // Validate
    $this->db->where('email', $email);

    $result = $this->db->get('users');

    if ($result->num_rows() == 1) {
        $row = $result->row(0);
        if (password_verify($password, $row->password)) {
            return $row->id;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
    
public function get_user_role($user_id) {
    $this->db->select('role_as');
    $this->db->where('id', $user_id);
    $query = $this->db->get('users');
    if ($query->num_rows() == 1) {
        $row = $query->row();
        return $row->role_as;
    } else {
        return false;
    }
}
    }
    