<?php
class RegisterModel extends CI_Model
{

  public function registerUser($data)
  {
    return $this->db->insert('users',$data);

  }
public function verify_email($key)
 {
  $this->db->where('verification_key', $key);
  $this->db->where('is_email_verified', 'no');
  $query = $this->db->get('users');
  if($query->num_rows() > 0)
  {
   $data = array(
    'is_email_verified'  => 'yes'
   );
   $this->db->where('verification_key', $key);
   $this->db->update('users', $data);
   return true;
  }
  else
  {
   return false;
  }
}
}
?>