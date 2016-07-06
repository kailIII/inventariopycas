
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('equipo_model','equipo');
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
            $this->load->view('equipo/index_view',$data);
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
                $list = $this->equipo->get_datatables();
		$no = $_POST['start'];
		foreach ($list as $person) {
                    $no++;
                    $row = array();
                    $row[] = "<p class='text-center letra1'>".$person->equipo."</p>";
                    $row[] = "<p class='letra1'>".$person->presentacion."</p>";
                    $row[] = "<p class='letra1'>".$person->marca."</p>";
                    $row[] = "<p class='letra1'>".$person->modelo."</p>";
                    $row[] = "<p class='letra1'>".$person->serial."</p>";
                    $row[] = "<p class='letra1'>".$person->accesorio."</p>";
                    $row[] = "<p class='letra1'>".$person->nomequipo."</p>";
                    $row[] = "<p class='letra1'>".$person->serialcargador."</p>";
                    $row[] = "<p class='letra1'>".$person->serialbateria."</p>";
                    $row[] = "<p class='letra1'>".$person->fechafabrica."</p>";
                    $row[] = '<a class="btn btn-sm btn-primary letra1" href="javascript:void(0)" title="Edit" onclick="edit_area('."'".$person->equipo."'".')"><i class="glyphicon glyphicon-pencil"></i></a>'
                            . '<a class="btn btn-sm btn-danger letra1" href="javascript:void(0)" title="Hapus" onclick="delete_area('."'".$person->equipo."'".')"><i class="glyphicon glyphicon-trash"></i></a>'
                            . '<a class="btn btn-sm btn-success letra1" href="javascript:void(0)" title="Hapus" onclick="add_area()"><i class="glyphicon glyphicon-plus"></i></a>';
                    $data[] = $row;
		}
                //echo '<pre>';print_r($_POST['draw']);exit;
		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->equipo->count_all(),
                        "recordsFiltered" => $this->equipo->count_filtered(),
                        "data" => $data,
                    );
		echo json_encode($output);
                break;
            case 'delete':
                $msj = $this->equipo->delete_by_id($_POST['id']);
		echo json_encode(array("msj" => $msj));
                break;
            case 'edit':
                $data = $this->equipo->get_by_id($_POST['id']);
                //echo '<pre>';print_r($data);exit;
		echo json_encode($data);
                break;
            case 'insert':
            case 'update':
                $msj = $this->equipo->crud($_POST);
		echo json_encode(array("msj" => $msj));
                break;
        endswitch;
    }
}
