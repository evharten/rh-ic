<?php
include("competities.php");
require_once("fpdf/fpdf.php");
require('pdfLabel.php');

$competitie = $competities[$_POST['competitie']];
$compNaam = $competitie[0];
$aantal = $competitie[1];
$typeComp = $competitie[2];

$naam = $_REQUEST['naam'];
$knsanummer = $_REQUEST['knsa'];
$page = 0;

if ($typeComp == "sticker")
{
	// $pdf = new PDF_Label(array('paper-size'=>'A4', 'metric'=>'mm', 'marginLeft'=>6, 'marginTop'=>12, 'NX'=>3, 'NY'=>8, 'SpaceX'=>1, 'SpaceY'=>0, 'width'=>70, 'height'=>35, 'font-size'=>12));
	$pdf = new PDF_Label('staples');
	$pdf->AddPage();

	for ($x = 0; $x < $aantal; $x++)
	{
			$text = sprintf("%s\n%s\n%s", "$compNaam", "Naam: $naam", "KNSA: $knsanummer");
			$pdf->Add_Label($text);
	}

	$pdf->Output("InterneCompetitie_$knsanummer.pdf", 'I');
}
 else 
{
	$pdf = new FPDF('A4');
	$pdf->AddPage();
	$pdf->Output("InterneCompetitie_$knsanummer.pdf", 'I');
}	 
?>