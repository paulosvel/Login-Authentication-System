<?php
class LoginModel extends CI_Model {


    public function login($data)
    {
        $this->db->select('*');
        $this->db->where('email',$data['email']);
        $this->db->from('users');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();
            if (password_verify($data['password'], $row->password)) {
                echo "Password verified\n";

                unset($row->password); // remove the password hash from the result
                return $row;
            }
        }
        return false;
    }
    
    }
    