<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Authentication extends CI_Model{

 public function __construct() {

 parent::__construct();
 if($this->session->has_userdata('authenticated'))
 {
   if($this->session->userdata('authenticated')== '1')
    echo "You are logged in";
}
else 
{
$this->session->set_flashdata('status','Login first please');
redirect(base_url('login'));

}
 }




}



?>