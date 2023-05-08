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
<select name="aantal">
<?php
foreach($competities AS $compName => $aantal)
{
	echo "<option value=\"$aantal\">$compName</option>\n";
}
?>
</select>
</td></tr>
<tr><td>Naam</td><td><input type="name" size=40></td></tr>
<tr><td>KNSA Nummer</td><td><input type="knsa" size=40></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" name="Stickers genereren"></td></tr>
</table>
</form>