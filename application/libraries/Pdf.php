<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH."/third_party/fpdf/fpdf.php";
    class Pdf extends FPDF {
        public function __construct($numreporte) {
            parent::__construct();
            $this->numreporte = $numreporte;
        }

        public function Header(){
            $this->SetFont('Arial','B',13);
            $this->Cell(30);
            switch ($this->numreporte):
                case '1':
                    $this->Cell(120,10,'LISTA DE USUARIOS',0,0,'C');
                    break;
                case '2':
                    $this->Cell(120,10,'Reporte de Areas',0,0,'C');
                    break;
                case '3':
                    $this->Cell(120,10,'Reporte de Salas',0,0,'C');
                    break;
                case '4':
                    $this->Cell(120,10,'Reporte de Equipos',0,0,'C');
                    break;
            endswitch;
            $this->Ln('5');
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(120,10,  utf8_decode('Año - 2016'),0,0,'C');
            $this->Ln(20);
       }

       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>;