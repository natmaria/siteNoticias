<?php
$PDO = new PDO("sqlite:dados/banco.db"); 

require_once("fpdf181/fpdf.php");

$pdf = new FPDF('P','cm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',22);
//$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(204,0,0);

$id=$_GET['id'];
$sql = $PDO->prepare("SELECT * FROM noticias WHERE id=?");
$sql->execute(array($id));
$not = $sql->fetch();

//var_dump($not);

$pdf->MultiCell(0,1,utf8_decode($not["titulo"]),0,'C',false);
$pdf->Ln(0.5);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(2.5,1,date("d/m/Y", $not["data_add"]),0,0,'L');
$pdf->Cell(6,1,"Autor:" . utf8_decode($not["autor"]),0,0,'L');
$pdf->Cell(0,1,"Acessos:" . $not["acessos"],0,1,'L');
$pdf->Ln(0.5);
$pdf->Image("img/" . $id .".jpg");
$pdf->Ln(0.5);
$pdf->MultiCell(0,0.5,utf8_decode($not["descricao"]),0);
$pdf->Output();
?>
