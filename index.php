<?php
include("competities.php");

?>
<html>
<head>
<title>Competitie stickers</title>
</head>
<body>
<form action="pdf.php" method="POST">
<table>
<tr><td>Competitie</td><td>
<select name="competitie">
<?php
foreach($competities AS $compIndex => $compData)
{
	echo "<option value=\"$compIndex\">".$compData[0]."</option>\n";
}
?>
</select>
</td></tr>
<tr><td>Naam</td><td><input type="text" name="naam" size=40></td></tr>
<tr><td>KNSA-Nummer</td><td><input type="text" name="knsa" size=40></td></tr>
<tr><td>KNSA-Nummer BaCo</td><td><input type="text" name="baco" size=40></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" name="Stickers genereren"></td></tr>
</table>
</form>