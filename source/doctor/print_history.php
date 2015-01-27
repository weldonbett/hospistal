<?php
/**
 * Created by PhpStorm.
 * User: WHIZZKID
 * Date: 17/03/14
 * Time: 11:52
 */
session_start();
include('../admin/model/database.php');
include('../fpdf/fpdf.php');

$pid = $_GET['pid'];
$patient = mysql_fetch_array(mysql_query("SELECT * FROM hos_patient WHERE id='$pid'"));

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial",'B',12);
$pdf->Cell(200,10,"PATIENT HISTORY REPORT FOR :");
$pdf->Ln();

$pdf->SetFont("Arial",'B',12);
$pdf->Cell(50,5,"NAME :");
$pdf->Cell(50,5,$patient['first_name']." ".$patient['middle_name']." ".$patient['last_name']);
$pdf->Ln();

$pdf->Cell(50,5,"GENDER :");
$pdf->Cell(50,5,$patient['gender']);
$pdf->Ln();

$pdf->Cell(50,5,"EMAIL :");
$pdf->Cell(50,5,$patient['email']);
$pdf->Ln();

$sql = mysql_query("SELECT * FROM hos_treatment WHERE patient_id='$pid'");
$res = mysql_fetch_array($sql);

do{

$pdf->SetFont("Arial",'B',10);
$pdf->Cell(50,5,$res['date']);
$pdf->Ln();

    $ress = mysql_fetch_array(mysql_query("SELECT * FROM hos_doctor WHERE id='$res[doctor_id]'"));
$pdf->SetFont("Arial",'',8);
$pdf->Cell(50,5,"Doctor : ");
$pdf->Cell(50,5,$ress['first_name']." ".$ress['middle_name']." ".$ress['last_name']);
$pdf->Ln();

$pdf->Cell(10,2,"BP");
$pdf->Cell(10,2,$res['bp']);
$pdf->Cell(10,2,"CR");
$pdf->Cell(10,2,$res['cr']);
$pdf->Cell(10,2,"RR");
$pdf->Cell(10,2,$res['rr']);
$pdf->Cell(10,2,"Temp");
$pdf->Cell(10,2,$res['temp']);
$pdf->Cell(10,2,"Weight");
$pdf->Cell(10,2,$res['weight']);
$pdf->Ln();

$pdf->Cell(100,2,"Complaint");
$pdf->Cell(100,2,$res['complaint']);
$pdf->Cell(100,2,"Medication");
$pdf->Cell(100,2,$res['medication']);
$pdf->Cell(100,2,"Quantity");
$pdf->Cell(100,2,$res['quantity']);
$pdf->Cell(100,2,"Remarks");
$pdf->Cell(100,2,$res['remarks']);
$pdf->Cell(100,2,"Next Visit");
$pdf->Cell(100,2,$res['next_visit']);
$pdf->Ln();
}while($res = mysql_fetch_array($sql));

$pdf->Output($pid."_history.pdf");
header("Location:".$pid."_history.pdf");
?>