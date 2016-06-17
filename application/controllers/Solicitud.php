<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('area_model','area');
    }

    public function index(){
        $this->load->helper('url');
        $data = array();
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['area'] = $this->area->obtenerAreas();
            $this->load->view('solicitud/solicitud_view',$data);
        }else{
            redirect('/login/index');
        }
    }
}
