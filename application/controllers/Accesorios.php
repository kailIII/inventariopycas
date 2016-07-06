
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accesorios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('accesorios_model','accesorios');
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
            $this->load->view('accesorios/index_view',$data);
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
                $list = $this->accesorios->get_datatables();
		$no = $_POST['start'];
		foreach ($list as $person) {
                    $no++;
                    $row = array();
                    $row[] = "<p class='text-center'>".$person->codaccesorio."</p>";
                    $row[] = $person->nomacesorio;
                    $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_area('."'".$person->codaccesorio."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                              <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_area('."'".$person->codaccesorio."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                             <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" onclick="add_area()"><i class="glyphicon glyphicon-plus"></i> Agregar</a>';
                    $data[] = $row;
		}
                //echo '<pre>';print_r($_POST['draw']);exit;
		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->accesorios->count_all(),
                        "recordsFiltered" => $this->accesorios->count_filtered(),
                        "data" => $data,
                    );
		echo json_encode($output);
                break;
            case 'delete':
                $msj = $this->accesorios->delete_by_id($_POST['id']);
		echo json_encode(array("msj" => $msj));
                break;
            case 'edit':
                $data = $this->accesorios->get_by_id($_POST['id']);
		echo json_encode($data);
                break;
            case 'insert':
            case 'update':
                $msj = $this->accesorios->crud($_POST);
		echo json_encode(array("msj" => $msj));
                break;
        endswitch;
    }
}
