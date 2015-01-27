<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Ln();
$pdf->Cell(100,20,'Another title goes here',1,'C',5);
$pdf->Output('simpleoutput.pdf');
?>