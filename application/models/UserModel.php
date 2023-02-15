<?php

class UserModel extends CI_Model
{

  public function loginUser($data)
{

$this->db->select('*');
$this->db->where('email',$data['email']);
$this->db->where('password',$data['password']);
$this->db->from('users');
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows()==1){
   return $query->row();
}
else {

  return false;
}


}
  public function registerUser($data)
  {
    return $this->db->insert('users',$data);

  }

  public function verify_email($key){

    $this->db->where('verification_key',$key);
    $this->db->where('is_email_verified','no');
    $query = $this->db->get('users');
    if($query->num_rows()>0){
      $data = array(
      'is_email_verified' => 'yes'
      );
    $this->db->where('verification_key',$key);
    $this->db->where('users',$data);
    return true;
    }
    else{
      return false;
    }
  }




}


?>