<?php
include("competities.php");
require_once("fpdf/fpdf.php");
require_once("fpdf/rpdf.php");
require_once('pdfLabel.php');

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
	$pdf = new RPDF();
	$pdf->AddPage();
	$pdf->SetFillColor(220);
	$pdf->Rect(20, 15, 165, 200, 'DF');
	$pdf->SetFont('Arial','B',16);
	// Logo + Tekst
	$pdf->Image('logo_rh_trans.png', 30, 25, 20, 20);
	$pdf->SetXY(60, 30);
	$pdf->Cell(100, 10, "Interne Competitie Service Pistool");
	
	// Naam Schutter
	$pdf->SetFillColor(255);
	$pdf->Rect(65, 50, 65, 8, 'DF');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(30, 50);
	$pdf->Cell(40, 8, "Naam Schutter");
	$pdf->SetXY(66, 50);
	$pdf->Cell(80, 8, $naam);
	
	// Wedstrijd Datum
	$pdf->SetFillColor(255);
	$pdf->Rect(65, 60, 40, 8, 'DF');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(30, 60);
	$pdf->Cell(40, 8, "Wedstrijd datum");
	$pdf->SetXY(66, 60);
	$pdf->Cell(40, 8, "           -           -   ".date("Y"));
	
	// KNSA Nummer
	$pdf->SetFillColor(255);
	$pdf->Rect(65, 70, 20, 8, 'DF');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(30, 70);
	$pdf->Cell(40, 8, "KNSA nummer");
	$pdf->SetXY(66, 70);
	$pdf->Cell(20, 8, $knsanummer);
	
	// Wedstrijd x van 6
	$pdf->SetFillColor(255);
	$pdf->Rect(100, 70, 20, 8, 'DF');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(120, 70);
	$pdf->Cell(20, 8, "wedstrijd van de 6");
	
	// Kaart definities en score vakjes
	$pdf->SetFillColor(255);
	$pdf->Rect(50, 80, 10, 40, 'DF');	// Linker
	$pdf->TextWithDirection(55,80,'Linker Kaart','U');
	$pdf->Rect(70, 80, 10, 40, 'DF');	// Rechter
	$pdf->TextWithDirection(75,80,'Rechter Kaart','U');
	$pdf->Rect(90, 80, 10, 40, 'DF');	// Totaal
	$pdf->TextWithDirection(95,80,'Totaal vd kaarten','U');
	
	// Totaal score
	
	// Handtekening schutter
	
	// Naam Medeschutter
	
	// Handtekening medeschutter
	
	// Uitleg competitie
	
	// SP instructies pagina 2 (2 zijdig printen!)
	
	
	
	
	
	
	
	
	$pdf->Output("InterneCompetitie_$knsanummer.pdf", 'I');
}	 
?>