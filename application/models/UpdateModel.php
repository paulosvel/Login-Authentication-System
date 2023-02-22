<?php
class UpdateModel extends CI_Model {
    
    public function update($user_id,$new_email,$new_first_name,$new_last_name, $new_password) 
{
    $data = array(
        'first_name' => $new_first_name,
        'last_name' => $new_last_name,
        'email' => $new_email,
        'password' => password_hash($new_password, PASSWORD_DEFAULT),
    );
    
    $this->db->where_in('id',$user_id);
    $this->db->update('users', $data);
    
    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
}


}
?>