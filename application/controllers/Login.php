<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model','usuarios');
    }

    public function index(){
        $username = $this->input->post('usuario');
        $password = $this->input->post('password');
        //var_dump($username,$password);exit;//imprimir variables
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = true;
        if($username == '' && $password == ''){
            $data['respuesta'] = '';
            $this->load->view('login/login_view',$data);
        }else{
            $datos = $this->usuarios->login($username,$password);
            //echo '<pre>';print_r($datos);exit;//imprimir arreglo
            $respuesta = count($datos);
            //var_dump($respuesta);exit;
            $valor = (($respuesta > 0)?true:false);
            if($valor == true){
                $sess_array = array('id' => $datos[0]['codigo'],
                    'username' => $datos[0]['nombres'],
                    'tipousu' => $datos[0]['tipousu'],
                    'permiso' => $datos[0]['permiso']);
                $this->session->set_userdata('logged_in', $sess_array);
                redirect('/principal/index');//te manda al controlador
            }else{
                $data['respuesta'] = '<div class="alert alert-danger">Usuario o contraseña incorrectos.</div>';
                $this->load->view('login/login_view',$data);
            }
        }
    }

    public function cerrarsession(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('/login/index');
    }
}
