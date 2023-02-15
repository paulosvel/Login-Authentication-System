<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class ForgotController extends CI_CONTROLLER{

    public function index(){
$this->load->view('auth/forgot.php');


    }


}



?>