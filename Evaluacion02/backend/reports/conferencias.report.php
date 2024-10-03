<?php
require_once('../config/config.php');
require_once('../reports/fpdf/fpdf.php');
require_once('../models/conferencias.model.php');

class PDF extends FPDF {

    function Header() {
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(255, 255, 255); 
        $this->SetFillColor(234, 69, 66); 
        $this->Cell(0, 15, 'Reporte de Conferencias', 0, 1, 'C', true);
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, 'Reporte ID: ' . rand(0, 99), 0, 1, 'C');
        $this->Cell(0, 10, 'Reporte Fecha: ' . date('Y-m-d'), 0, 1, 'C');
        $this->Ln(10);
        #Logo
        #$this->Image('../../images/logo.png', 10, 6, 30);
    }
    
    function Footer() {        
        $this->SetY(-30);
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(128, 128, 128);        
        $this->Cell(0, 10, 'Desarrollado RSALAZAR', 0, 1, 'C');  #Firma        
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C'); #Número de página
    }
    
    function TablaConferencias($header, $data) {        
        $this->SetFillColor(156, 39, 176);
        $this->SetTextColor(255); 
        $this->SetDrawColor(48, 63, 159);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 12);        
        $w = array(13, 43, 43, 44, 44); #Ancho de las columnas        
        #Cabeceras
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();        
        #Restaurar colores y fuente para el cuerpo de la tabla
        $this->SetFillColor(224, 224, 224);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 10);
        $fill = false;        
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row['conferencia_id'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['nombre'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['fecha'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row['ubicacion'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row['descripcion'], 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }        
        $this->Cell(array_sum($w), 0, '', 'T'); #Línea de cierre
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$header = array('ID', 'Nombre', 'Fecha', 'Ubicacion', 'Descripcion');

$conferencia = new Conferencia();
$datos = $conferencia->todos();
$conferencias = [];
while ($row = mysqli_fetch_assoc($datos)) {
    $conferencias[] = $row;
}
$pdf->TablaAsistentes($header, $conferencias);
$pdf->Output();
?>