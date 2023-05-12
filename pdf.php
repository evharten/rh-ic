<?php

include("competities.php");

require_once("fpdf/fpdf.php");

$competitie = $competities[$_POST['competitie']];
$compNaam = $competitie[0];
$aantal = $competitie[1];
$naam = $_REQUEST['naam'];
$knsanummer = $_REQUEST['knsa'];

$pdf=new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$page++;

$hCount = 0;

for ($x = 0; $x < 24; $x++)
{
	// 24 labels to go on the paper
	if ($hCount >= 3)
	{
		$pdf->SetX(0);
	} else {
		$pdf->SetX($pdf->GetX()+20);
	}
	
	if (($x+1) <= $aantal)
	{
		$pdf->SetFont('Helvetica','B',14);
		$pdf->Cell(20,10,$compNaam,0,0);
		$pdf->Ln(5);
		$pdf->Cell(20,10,"Naam: $naam",0,0);
		$pdf->Ln(5);
		$pdf->Cell(20,10,"KNSA: $knsanummer",0,0);
		$pdf->Ln(5);
	} else {
		$pdf->SetFont('Helvetica','B',14);
		$pdf->Cell(20,10,"",0,0);
		$pdf->Ln(5);
		$pdf->Cell(20,10,"",0,0);
		$pdf->Ln(5);
		$pdf->Cell(20,10,"",0,0);		
		$pdf->Ln(5);
	}
	$hCount++;
	
}

$pdf->Output("InterneCompetitie_$knsanummer.pdf", 'I');
	
?>
