<?php
require('herramientas/fpdf/fpdf.php');
include_once('bd_conexion/conexion.php');


$arrayResultado = Productos::TraerProductos();


//----*************///
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de productos',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(50,10,'nombre',1,0,'C',0);
    $this->Cell(45,10,'precio',1,0,'C',0);
    $this->Cell(45,10,'stok',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

foreach ($arrayResultado as $key => $value) {
    $pdf->Cell(50,10,$value['nombre'],1,0,'C',0);
    $pdf->Cell(45,10,$value['precio'],1,0,'C',0);
    $pdf->Cell(45,10,$value['stock'],1,1,'C',0);
}


$pdf->Output();

?>