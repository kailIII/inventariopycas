<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reportes extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model','usuarios');
        $this->load->model('area_model','area');
    }

    public function index(){
        $this->load->helper('url');
        $data = array();
        $data['csslogin'] = false;
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['reportes'] = array('1'=>'Reporte de Usuarios','2'=>'Reporte de Areas');
            $this->load->view('reportes/index_view',$data);
        }else{
            redirect('/login/index');
        }
    }

    public function generarreportes(){
        $numreporte = $this->input->get('numreporte');
        $this->load->library('pdf');
        switch ($numreporte):
            case '1':
                $id = '';
                $usuarios = $this->usuarios->obtenerUsuario($id,true);
                $this->pdf = new Pdf($numreporte);
                $this->pdf->AddPage();
                $this->pdf->AliasNbPages();
                $this->pdf->SetTitle("Lista de alumnos");
                $this->pdf->SetLeftMargin(15);
                $this->pdf->SetRightMargin(15);
                $this->pdf->SetFillColor(200,200,200);
                $this->pdf->SetFont('Arial', 'B', 9);
                $this->pdf->Cell(15,7,'CODIGO','TBL',0,'C','1');
                $this->pdf->Cell(25,7,'NOMBRES','TB',0,'L','1');
                $this->pdf->Cell(25,7,'APELLIDOS','TB',0,'L','1');
                $this->pdf->Cell(25,7,'SEXO','TB',0,'L','1');
                $this->pdf->Cell(25,7,'ESTADO','TB',0,'C','1');
                $this->pdf->Cell(25,7,'DIRECCION','TB',0,'L','1');
                $this->pdf->Cell(25,7,'PERMISO','TBR',0,'C','1');
                $this->pdf->Ln(7);
                foreach ($usuarios as $valor) {
                    $this->pdf->Cell(15,5,$valor['codigo'],'BL',0,'C',0);
                    $this->pdf->Cell(25,5,$valor['nombres'],'B',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['apellidos'],'B',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['sexo'],'B',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['estado'],'B',0,'C',0);
                    $this->pdf->Cell(25,5,$valor['direccion'],'B',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['permiso'],'BR',0,'C',0);
                    $this->pdf->Ln(5);
                }
                break;
            case '2':
                $id = '';
                $areas = $this->area->obtenerAreas();
                $this->pdf = new Pdf($numreporte);
                $this->pdf->AddPage();
                $this->pdf->AliasNbPages();
                $this->pdf->SetTitle("Lista de Areas");
                $this->pdf->SetLeftMargin(15);
                $this->pdf->SetRightMargin(15);
                $this->pdf->SetFillColor(200,200,200);
                $this->pdf->SetFont('Arial', 'B', 9);
                $this->pdf->Cell(15,7,'CODIGO','TBL',0,'C','1');
                $this->pdf->Cell(100,7,'NOMBRES','BRLT',0,'C','1');
                $this->pdf->Ln(7);
                foreach ($areas as $valor) {
                    $this->pdf->Cell(15,5,$valor['codarea'],'BL',0,'C',0);
                    $this->pdf->Cell(100,5,$valor['nombre'],'BRLT',0,'L',0);
                    $this->pdf->Ln(5);
                }
                break;
        endswitch;
        ob_end_clean(); 
        $this->pdf->Output("ListaDeUsuarios.pdf", 'I');
    }
}
