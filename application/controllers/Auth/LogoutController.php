<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class LogoutController extends CI_CONTROLLER{

public function logout(){

    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('user_id');
    $this->session->set_flashdata('status','You are logged out successfully');
    redirect(base_url('login'));
}


}

?>