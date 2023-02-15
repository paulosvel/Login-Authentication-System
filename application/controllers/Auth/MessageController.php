<?php
class MessageController extends CI_CONTROLLER {

    public function create(){
     $data['title'] = 'Create Post';
     $this->load->view('auth/create',$data);
     $this->load->view('template/header.php');
    }

    






}
?>