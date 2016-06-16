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
        $username = $this->input->post('usuario');
        $password = $this->input->post('password');
        $this->load->helper('url');
        $data = array();
        if($username == '' && $password == ''){
            $data['respuesta'] = '';
            $this->load->view('login/login_view',$data);
        }else{
            $datos = $this->usuarios->login($username,$password);
            if($datos){
                $data['respuesta'] = 'Correctos';
                $this->load->view('principal/principal_view',$data);
            }else{
                $data['respuesta'] = '<div class="alert alert-danger">Usuario o contraseña incorrectos.</div>';
                $this->load->view('login/login_view',$data);
            }
        }
    }
}
