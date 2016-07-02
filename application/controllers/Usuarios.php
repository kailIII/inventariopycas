<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model','usuarios');
    }

    public function index(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['tipousu'] = $session_data['tipousu'];
            $data['permiso'] = $session_data['permiso'];
            $this->load->view('usuarios/usuarios_view',$data);
        }else{
            redirect('/login/index');
        }
    }
    
    public function perfil(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $datos = $this->usuarios->obtenerUsuario($data['id']);
            $data['datosusu'] = $datos;
            $data['tipousu'] = $session_data['tipousu'];
            $data['permiso'] = $session_data['permiso'];
            $this->load->view('usuarios/perfil_view',$data);
        }else{
            redirect('/login/index');
        }
    }
    
    public function editar(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $datos = $this->usuarios->obtenerUsuario($data['id']);
            $data['datosusu'] = $datos;
            $data['tipousu'] = $session_data['tipousu'];
            $data['permiso'] = $session_data['permiso'];
            $this->load->view('usuarios/editar_view',$data);
        }else{
            redirect('/login/index');
        }
    }

    public function registrar(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['tipousu'] = $session_data['tipousu'];
            $data['permiso'] = $session_data['permiso'];
            $this->load->view('usuarios/registrar_view',$data);
        }else{
            redirect('/login/index');
        }
    }

    public function json(){
        $this->url_elements = explode('/', $_SERVER['PATH_INFO']);
        $case = $this->url_elements[4];
        switch ($case):
            case 'add':
            case 'update':
                $msj = $this->usuarios->crud($_POST);
                break;
        endswitch;
	echo json_encode(array("msj" => $msj));
    }
}
