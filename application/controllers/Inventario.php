<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('area_model','area');
        $this->load->model('solicitudsala_model','solicitud');
        $this->load->model('accesorios_model','accesorios');
        $this->load->model('sala_model','sala');
        $this->load->model('inventario_model','inventario');
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
            $data['inventario'] = $this->inventario->obtenerInventario();
            //echo '<pre>';print_r($data['accesorios']);exit;
            $this->load->view('inventario/inventario_view',$data);
        }else{
            redirect('/login/index');
        }
    }

    public function ajax(){
        $this->url_elements = explode('/', $_SERVER['PATH_INFO']);
        $case = $this->url_elements[3];
        switch ($case):
            case 'listinventario':
		$data = array();
                $list = $this->inventario->get_datatables();
                //echo '<pre>';print_r($list);exit;
		$no = $_POST['start'];
		foreach ($list as $person) {
                    $no++;
                    $row = array();
                    $row[] = $person->codinventario;
                    $row[] = $person->usuario;
                    $row[] = $person->inventario;
                    $row[] = $person->usuario;
                    $row[] = $person->nombre;
                    $row[] = $this->estado($person->estadoinv);
                    $row[] = $person->observaciones;
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
                //echo '<pre>';print_r($_POST);exit;
                $msj = $this->solicitud->crud($_POST);
                $msj1 = $this->solicitud->sala->updatesala($_POST);
		echo json_encode(array("msj" => $msj));
                break;
        endswitch;
    }
    
    public function estado($estado){
        $nom = '';
        switch ($estado):
            case 'P': $nom = 'Permanente'; break;
            case 'V': $nom = 'Volante'; break;
            case 'C': $nom = 'PERSONAL(CESION)'; break;
        endswitch;
        return $nom;
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
            $this->load->view('solicitud/equipo_view',$data);
        }else{
            redirect('/login/index');
        }
    }
}
