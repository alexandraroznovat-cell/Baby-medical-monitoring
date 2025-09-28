<?php
	session_start();
	include("conectare.php");
	include("page_top.php");
	include("meniu.php");
?>
<td valign="top">
<h2>Casa</h2>
Acestea sunt produsele comandate:<br><br>
<table border="1" cellspacing="0" cellpading="4">
	<tr bgcolor="#FCE4EC">
		<td align="center"><b>Cantitate</b></td>
		<td align="center"><b>Produs </b></td>
		<td align="center"><b>Preț </b></td>
		<td align="center"><b>Total </b></td>
	</tr>
<?php
	$totalGeneral =0;
	for($i=0;$i<count($_SESSION['id_produs']);$i++)
	{
		if($_SESSION['nr_bucati'][$i] !=0)
		{
			print '<tr>
			<td align="center">'.$_SESSION['nr_bucati'][$i].'</td><td><b>'
			.$_SESSION['oferta_produs'][$i].'</b> de: '.$_SESSION['producator'][$i].'</td>
			<td align="right">'.$_SESSION['pret'][$i].' lei</td>
			<td align="right">'
			.($_SESSION['nr_bucati'][$i]*$_SESSION['pret'][$i]).' lei </td>
			</tr>';
			$totalGeneral = $totalGeneral + ($_SESSION['nr_bucati'][$i] * $_SESSION['pret'][$i]);
		}
	}
	//afisam totalul general
	print '<tr>
	<td align="right" colspan="3"><b>Total de plata</b></td>
	<td align="right"><b>'.$totalGeneral.'</b> lei</td>
	</tr>';
?>
</table>
<h3>Detalii client</h3>
Introduceți numele și adresa unde doriți să primiți produsele comandate
<form action="prelucrare.php" method="POST">
<table>
	<tr>
	<td><b>Nume:</b></td>
	<td><input type="text" name="nume"></td>
	</tr>
	<tr>
	<td valign="top"><b>Adresă:</b></td>
	<td><textarea name="adresa" rows="6"></textarea></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" value="Trimite"></td>
	</tr>
</table>
</form>
</td>
<?php
	include("page_bottom.php");
?>