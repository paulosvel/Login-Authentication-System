<?php
class UpdateModel extends CI_Model {

  public function Update_User_Data($user_id, $data) {
    $this->db->set($data);
    $this->db->where('id', $user_id);
    $this->db->update('users', $data);
    if($this->db->affected_rows()>0)
    return true;
    else
    return false;
  }
  
}
?>
