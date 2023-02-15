<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct(){
    parent::__construct();
    $this->load->model('Authentication');

    }


public function index()
{

    $this->load->view('auth/userpage.php');
    $this->load->view('template/header.php');
}

public function profile()
{

    $this -> load->view('auth/userpage.php');

}

}
?>
