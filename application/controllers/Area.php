<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

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
            $this->load->view('area/index_view',$data);
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
                $list = $this->area->get_datatables();
		$no = $_POST['start'];
		foreach ($list as $person) {
                    $no++;
                    $row = array();
                    $row[] = $person->codigo;
                    $row[] = $person->nombre;
                    $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_area('."'".$person->codigo."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                              <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_area('."'".$person->codigo."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                    $data[] = $row;
		}
		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->area->count_all(),
                        "recordsFiltered" => $this->area->count_filtered(),
                        "data" => $data,
                    );
		echo json_encode($output);
                break;
            case 'delete':
                $msj = $this->area->delete_by_id($_POST['id']);
		echo json_encode(array("msj" => $msj));
                break;
            case 'edit':
                $data = $this->area->get_by_id($_POST['id']);
		echo json_encode($data);
                break;
            case 'insert':
            case 'update':
                $msj = $this->area->crud($_POST);
		echo json_encode(array("msj" => $msj));
                break;
        endswitch;
    }
}
