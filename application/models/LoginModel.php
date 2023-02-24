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
    
    }
    