<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('area_model','area');
        $this->load->model('solicitudsala_model','solicitud');
        $this->load->model('solicitudequipo_model','equipo');
        $this->load->model('accesorios_model','accesorios');
        $this->load->model('equipo_model','equipos');
        $this->load->model('sala_model','sala');
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
            $data['area'] = $this->area->obtenerAreas();
            $data['accesorios'] = $this->accesorios->obtenerAccesorios();
            //echo '<pre>';print_r($data['accesorios']);exit;
            $this->load->view('solicitud/solicitud_view',$data);
        }else{
            redirect('/login/index');
        }
    }

    public function ajax(){
        $this->url_elements = explode('/', $_SERVER['PATH_INFO']);
        $case = $this->url_elements[3];
        switch ($case):
            case 'listsala':
		$data = array();
                $list = $this->sala->get_datatables();
		$no = $_POST['start'];
		foreach ($list as $person) {
                    $no++;
                    $row = array();
                    $row[] = $person->codsala;
                    $row[] = (($person->ocupado=='S'?'Si':'No'));
                    $row[] = $person->horaini;
                    $row[] = $person->horafin;
                    $data[] = $row;
		}
		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->solicitud->count_all(),
                        "recordsFiltered" => $this->solicitud->count_filtered(),
                        "data" => $data,
                    );
                
		echo json_encode($output);
                break;
            case 'listequipo':
                $data = array();
                $list = $this->equipo->get_datatables();
		$no = $_POST['start'];
		foreach ($list as $person) {
                    $no++;
                    $row = array();
                    $row[] = $person->idequipo;
                    $row[] = $person->nomcomp;
                    $row[] = $person->presentacion;
                    $row[] = (($person->cargo == 'G')?'Gerente':'Usuario');
                    $row[] = $person->nombre;
                    $row[] = $person->hora;
                    $row[] = $person->fechaentrega;
                    $row[] = $person->fechadevulucion;
                    $data[] = $row;
		}
		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->equipo->count_all(),
                        "recordsFiltered" => $this->equipo->count_filtered(),
                        "data" => $data,
                    );
                
		echo json_encode($output);
                break;
            case 'delete':
                $msj = $this->solicitud->delete_by_id($_POST['id']);
		echo json_encode(array("msj" => $msj));
                break;
            case 'edit':
                $data = $this->solicitud->get_by_id($_POST['codigo']);
		echo json_encode($data);
                break;
            case 'insert':
            case 'update':
                //echo '<pre>';print_r($_POST);exit;
                $msj = $this->solicitud->crud($_POST);
                $msj1 = $this->solicitud->sala->updatesala($_POST);
		echo json_encode(array("msj" => $msj));
                break;
            case 'insertequipo':
            case 'updateequipo':
                $msj = $this->equipo->crud($_POST);
                echo json_encode(array("msj" => $msj));
                break;
        endswitch;
    }
    
    public function sala(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['tipousu'] = $session_data['tipousu'];
            $data['permiso'] = $session_data['permiso'];
            $data['area'] = $this->area->obtenerAreas();
            //echo '<pre>';print_r($data['area']);exit;obtenersalaocupado
            $data['accesorios'] = $this->accesorios->obtenerAccesorios();
            $data['sala'] = $this->sala->obtenerSalas();
            $data['obtenersalaocupado'] = $this->sala->obtenersalaocupado();
            $salactn = count($data['obtenersalaocupado']);
            if($salactn>0){
                $data['salamsj'] = 'S';
            }else{
                $data['salamsj'] = 'N';
                $data['obtenersalaocupado'] = array();
            }
            $this->load->view('solicitud/sala_view',$data);
        }else{
            redirect('/login/index');
        }
    }
    
    public function soporte(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['tipousu'] = $session_data['tipousu'];
            $data['permiso'] = $session_data['permiso'];
            $data['area'] = $this->area->obtenerAreas();
            $data['accesorios'] = $this->accesorios->obtenerAccesorios();
            //echo '<pre>';print_r($data['accesorios']);exit;
            $this->load->view('solicitud/soporte_view',$data);
        }else{
            redirect('/login/index');
        }
    }
    
    public function equipo(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['tipousu'] = $session_data['tipousu'];
            $data['permiso'] = $session_data['permiso'];
            $data['area'] = $this->area->obtenerAreas();
            $data['accesorios'] = $this->accesorios->obtenerAccesorios();
            $data['equipos'] = $this->equipos->obtenerEquipos();
            $this->load->view('solicitud/equipo_view',$data);
        }else{
            redirect('/login/index');
        }
    }
}
