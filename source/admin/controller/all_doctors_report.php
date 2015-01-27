<?php
session_start();
include('../model/database.php');
include('../../fpdf/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont("Arial",'B',12);
$pdf->Cell(200,5,"Meru Hospice Palliative Care Patient Records System",'','','C');

$pdf->Ln(20);
$pdf->SetFont("Arial",'B',10);
$pdf->Cell(100,5,"Report of All Registered Doctors");

$pdf->Ln(10);
$pdf->Cell(50,5,"Doctor's Name",1,'','C');
$pdf->Cell(30,5,"Specialization",1,'','C');
$pdf->Cell(20,5,"Duty",1,'','C');
$pdf->Cell(40,5,"Contact Number",1,'','C');
$pdf->Cell(50,5,"Hospital",1,'','C');

$pdf->Ln();
$pdf->SetFont("Arial",'',8);

				$sql = mysql_query("SELECT * FROM hos_doctor") or die(mysql_error());
				$docs = mysql_fetch_array($sql);
				
				if($docs > 0){
				do{
					$pdf->Cell(50,5,$docs['first_name']."".$docs['middle_name']."".$docs['last_name'],1);
					$pdf->Cell(30,5,$docs['specialization'],1);
					$pdf->Cell(20,5,$docs['duty'],1);
					$pdf->Cell(40,5,$docs['phone'],1);
					$pdf->Cell(50,5,$docs['hospital_id'],1);
					$pdf->Ln();
				}
				while($docs = mysql_fetch_array($sql));
				}else{
					$pdf->Cell(190,5,"NO RECORDS FOUND",1,'','C');
				}

$pdf->Output("all_doctors_report.pdf");

header("Location:all_doctors_report.pdf");
?>