<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model','usuarios');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('login_view');
    }
    
    public function login(){
        $data = $this->usuarios->login('cnieve','123456');
        echo '<pre>';print_r($data);exit();
    }
}
