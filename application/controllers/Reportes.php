<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reportes extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model','usuarios');
        $this->load->model('area_model','area');
        $this->load->model('sala_model','sala');
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
            $data['reportes'] = array('1'=>'Reporte de Usuarios','2'=>'Reporte de Areas','3'=>'Reporte de Salas','4'=>'Reporte de Equipos');
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
                $this->pdf->Cell(30,7,'APELLIDOS','TB',0,'L','1');
                $this->pdf->Cell(25,7,'SEXO','TB',0,'L','1');
                $this->pdf->Cell(25,7,'ESTADO','TB',0,'C','1');
                $this->pdf->Cell(25,7,'DIRECCION','TB',0,'L','1');
                $this->pdf->Cell(25,7,'PERMISO','TBR',0,'C','1');
                $this->pdf->Ln(7);
                $this->pdf->SetFont('Arial','',8);
                foreach ($usuarios as $valor) {
                    $this->pdf->Cell(15,5,$valor['codigo'],'BL',0,'C',0);
                    $this->pdf->Cell(25,5,$valor['nombres'],'B',0,'L',0);
                    $this->pdf->Cell(30,5,  utf8_decode($valor['apellidos']),'B',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['sexo'],'B',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['estado'],'B',0,'C',0);
                    $this->pdf->Cell(25,5,$valor['direccion'],'B',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['permiso'],'BR',0,'C',0);
                    $this->pdf->Ln(5);
                }
                $this->pdf->Image('imagenes/firma.png',60,230,50,20,'PNG');
                $this->pdf->Image('imagenes/empresa.png',10,230,50,20,'PNG');
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
            case '3':
                $id = '';
                $salas = $this->sala->obtenerSalas();
                $this->pdf = new Pdf($numreporte);
                $this->pdf->AddPage();
                $this->pdf->AliasNbPages();
                $this->pdf->SetTitle("Lista de Areas");
                $this->pdf->SetLeftMargin(15);
                $this->pdf->SetRightMargin(15);
                $this->pdf->SetFillColor(200,200,200);
                $this->pdf->SetFont('Arial', 'B', 9);
                $this->pdf->Cell(15,7,'CODIGO','TBL',0,'C','1');
                $this->pdf->Cell(25,7,'OCUPADO','BRLT',0,'C','1');
                $this->pdf->Cell(30,7,'HORA INICIO','BRLT',0,'C','1');
                $this->pdf->Cell(30,7,'HORA FIN','BRLT',0,'C','1');
                $this->pdf->Cell(60,7,'NOMBRE SALA','BRLT',0,'C','1');
                $this->pdf->Ln(7);
                foreach ($salas as $valor) {
                    $this->pdf->Cell(15,5,$valor['codsala'],'BL',0,'C',0);
                    $this->pdf->Cell(25,5,(($valor['ocupado']=='S')?'Si':'No'),'BRLT',0,'C',0);
                    $this->pdf->Cell(30,5,$valor['horaini'],'BL',0,'C',0);
                    $this->pdf->Cell(30,5,$valor['horafin'],'BRLT',0,'C',0);
                    $this->pdf->Cell(60,5,$valor['nomsala'],'BRLT',0,'L',0);
                    $this->pdf->Ln(5);
                }
                break;
            case '4':
                $id = '';
                $salas = $this->equipo->obtenerEquipos();
                $this->pdf = new Pdf($numreporte);
                $this->pdf->AddPage();
                $this->pdf->AliasNbPages();
                $this->pdf->SetTitle("Lista de Areas");
                $this->pdf->SetLeftMargin(15);
                $this->pdf->SetRightMargin(15);
                $this->pdf->SetFillColor(200,200,200);
                $this->pdf->SetFont('Arial', 'B', 6);
                $this->pdf->Cell(12,7,'EQUIPO','TBL',0,'C','1');
                $this->pdf->Cell(20,7,'PRESENTACION','BRLT',0,'C','1');
                $this->pdf->Cell(12,7,'MARCA','BRLT',0,'C','1');
                $this->pdf->Cell(20,7,'MODELO','BRLT',0,'C','1');
                $this->pdf->Cell(15,7,'SERIAL','BRLT',0,'C','1');
                $this->pdf->Cell(17,7,'ACCESORIO','BRLT',0,'C','1');
                $this->pdf->Cell(17,7,'NOM EQUIPO','BRLT',0,'C','1');
                $this->pdf->Cell(25,7,'SERIAL CARGADOR','BRLT',0,'C','1');
                $this->pdf->Cell(25,7,'SERIAL BATERIA','BRLT',0,'C','1');
                $this->pdf->Cell(20,7,'FECHA FABRICA','BRLT',0,'C','1');
                $this->pdf->Ln(7);
                $this->pdf->SetFont('Arial', '', 6);
                //equipo`, `presentacion`, `marca`, `modelo`, `serial`, `accesorio`, `nomequipo`, `serialcargador`, `serialbateria`, `fechafabrica
                foreach ($salas as $valor) {
                    $this->pdf->Cell(12,5,$valor['equipo'],'BL',0,'C',0);
                    $this->pdf->Cell(20,5,$valor['presentacion'],'BRLT',0,'C',0);
                    $this->pdf->Cell(12,5,$valor['marca'],'BL',0,'C',0);
                    $this->pdf->Cell(20,5,$valor['modelo'],'BRLT',0,'C',0);
                    $this->pdf->Cell(15,5,$valor['serial'],'BRLT',0,'L',0);
                    $this->pdf->Cell(17,5,$valor['accesorio'],'BRLT',0,'L',0);
                    $this->pdf->Cell(17,5,$valor['nomequipo'],'BRLT',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['serialcargador'],'BRLT',0,'L',0);
                    $this->pdf->Cell(25,5,$valor['serialbateria'],'BRLT',0,'L',0);
                    $this->pdf->Cell(20,5,$valor['fechafabrica'],'BRLT',0,'C',0);
                    $this->pdf->Ln(5);
                }
                break;
        endswitch;
        ob_end_clean(); 
        $this->pdf->Output("ListaDeUsuarios.pdf", 'I');
    }
}
