<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('area_model','area');
        $this->load->model('solicitud_model','solicitud');
    }

    public function index(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['area'] = $this->area->obtenerAreas();
            $this->load->view('solicitud/solicitud_view',$data);
        }else{
            redirect('/login/index');
        }
    }

    public function ajax(){
        $this->url_elements = explode('/', $_SERVER['PATH_INFO']);
        $case = $this->url_elements[3];
        switch ($case):
            case 'list':
		$data = array();
                $list = $this->solicitud->get_datatables();
		$no = $_POST['start'];
		foreach ($list as $person) {
                    $no++;
                    $row = array();
                    $row[] = $person->codigo;
                    $row[] = $person->fecha;
                    $row[] = $person->hora;
                    $row[] = (($person->cargo == 'U')?'Usuario':'Generente');
                    $row[] = $person->requerimiento;
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
                $msj = $this->solicitud->crud($_POST);
		echo json_encode(array("msj" => $msj));
                break;
        endswitch;
    }
}
