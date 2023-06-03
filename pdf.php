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
	$pdf->Rect(20, 15, 165, 225, 'DF');
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
	$pdf->TextWithDirection(56,115,'Linker Kaart','U');
	$pdf->Rect(70, 80, 10, 40, 'DF');	// Rechter
	$pdf->TextWithDirection(76,115,'Rechter Kaart','U');
	$pdf->Rect(90, 80, 10, 40, 'DF');	// Totaal
	$pdf->TextWithDirection(96,115,'Totaal vd kaarten','U');
	
	// Vakjes
	$pdf->SetFillColor(255);
	$pdf->Rect(50, 122, 10, 10, 'DF');	// Linker
	$pdf->SetXY(63, 123);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(70, 122, 10, 10, 'DF');	// Rechter
	$pdf->SetXY(83, 123);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(90, 122, 10, 10, 'DF');	// Totaal
	$pdf->SetXY(101, 123);
	$pdf->Cell(10, 8, 'x 10 =');
	$pdf->Rect(115, 122, 40, 10, 'DF');	// Totaal
	
	$pdf->Rect(50, 134, 10, 10, 'DF');	// Linker
	$pdf->SetXY(63, 135);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(70, 134, 10, 10, 'DF');	// Rechter
	$pdf->SetXY(83, 135);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(90, 134, 10, 10, 'DF');	// Totaal
	$pdf->SetXY(101, 135);
	$pdf->Cell(10, 8, 'x 9 =');
	$pdf->Rect(115, 134, 40, 10, 'DF');	// Totaal
	
	$pdf->Rect(50, 146, 10, 10, 'DF');	// Linker
	$pdf->SetXY(63, 147);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(70, 146, 10, 10, 'DF');	// Rechter
	$pdf->SetXY(83, 147);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(90, 146, 10, 10, 'DF');	// Totaal
	$pdf->SetXY(101, 147);
	$pdf->Cell(10, 8, 'x 8 =');
	$pdf->Rect(115, 146, 40, 10, 'DF');	// Totaal
	
	$pdf->Rect(50, 158, 10, 10, 'DF');	// Linker
	$pdf->SetXY(63, 159);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(70, 158, 10, 10, 'DF');	// Rechter
	$pdf->SetXY(83, 159);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(90, 158, 10, 10, 'DF');	// Totaal
	$pdf->SetXY(101, 159);
	$pdf->Cell(10, 8, 'x 7 =');
	$pdf->Rect(115, 158, 40, 10, 'DF');	// Totaal
	
	$pdf->Rect(50, 170, 10, 10, 'DF');	// Linker
	$pdf->SetXY(63, 171);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(70, 170, 10, 10, 'DF');	// Rechter
	$pdf->SetXY(83, 171);
	$pdf->Cell(8, 8, '+');
	$pdf->Rect(90, 170, 10, 10, 'DF');	// Totaal
	$pdf->SetXY(101, 171);
	$pdf->Cell(10, 8, 'x 6 =');
	$pdf->Rect(115, 170, 40, 10, 'DF');	// Totaal
	
	// Totaal score
	$pdf->SetXY(80, 183);
	$pdf->Cell(20, 8, 'Totaal score');
	$pdf->Rect(105, 182, 50, 10, 'DF');	// Totaal Score
	
	// Handtekening schutter
	$pdf->SetXY(30, 197);
	$pdf->Cell(20, 8, 'Handtekening schutter');
	$pdf->Rect(85, 196, 70, 10, 'DF');	// Totaal Score
	
	// Naam Medeschutter
	$pdf->SetXY(30, 210);
	$pdf->Cell(20, 8, 'Naam medeschutter');
	$pdf->Rect(85, 209, 70, 10, 'DF');	// Totaal Score
	
	// Handtekening medeschutter
	$pdf->SetXY(30, 223);
	$pdf->Cell(20, 8, 'Handtekening medeschutter');
	$pdf->Rect(85, 222, 70, 10, 'DF');	// Totaal Score
	
	// Uitleg competitie
	$curX = 15;
	$curY = 235;
	$pdf->SetFont('Arial','',6);
	
	foreach ($spInstructie AS $lineNR => $lineTekst)
	{
		$pdf->SetXY($curX, $curY);
		$pdf->Cell(10, 8, $lineTekst);
		
		$curX = $curX;
		$curY = $curY+5;
	}
	
	
	
	// SP instructies pagina 2 (2 zijdig printen!)
	
	
	
	
	
	
	
	
	$pdf->Output("InterneCompetitie_$knsanummer.pdf", 'I');
}	 
?>