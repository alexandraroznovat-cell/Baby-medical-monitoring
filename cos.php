<?php
	session_start();
	include("conectare.php");
	include("page_top.php");
	include("meniu.php");
	//$actiune = $_GET['actiune'];
	/* Dacă este setată variabila $_GET[‘actiune’] şi valoarea acesteia este "adaugă", se
	execută următorul cod: */
	if(isset($_GET['actiune']) && $_GET['actiune'] == "adauga")
	{
		$_SESSION['id_produs'][] = $_POST['id_produs'];
		$_SESSION['nr_bucati'][] = 1;
		$_SESSION['pret'][] = $_POST['pret'];
		$_SESSION['oferta_produs'][] = $_POST['oferta_produs'];
		$_SESSION['producator'][] = $_POST['producator'];
	}
	/* Dacă este setată variabila $_GET[‘actiune’] şi valoarea acesteia este „Modifica", se execută
	următorul cod: */
	if(isset ($_GET['actiune']) && $_GET['actiune'] == "modifica")
	{
		for($i=0; $i<count ($_SESSION['id_produs']); $i++)
		{
			$_SESSION['nr_bucati'][$i] = $_POST['noulNrBuc'][$i];
		}
	}
?>
<td valign="top">
	<h2>Coșul de cumparaturi</h2>
	<form action="cos.php?actiune=modifica" method="POST">
		<table border="1" cellspacing="0" cellpading="4">
		<tr bgcolor="#FCE4EC">
			<td align="center"><b>Cantitate</b></td>
			<td align="center"><b>Produs</b></td>
			<td align="center"><b>Preț </b></td>
			<td align="center"><b>Total </b></td>
		</tr>
	<?php
	$totalGeneral=0;
	for($i=0; $i<count($_SESSION['id_produs']); $i++)
	{
		if($_SESSION['nr_bucati'][$i] !=0)
		{
			/*doar daca numarul de bucati nu este 0, afiseaza randul*/
			print '<tr>
			<td><input type="text" name="noulNrBuc['.$i.']" size="1"
			value="'.$_SESSION['nr_bucati'][$i].'"></td>
			<td><b>'.$_SESSION['oferta_produs'][$i].'</b> de:
			'.$_SESSION['producator'][$i].'</td>
			<td align="right">'.$_SESSION['pret'][$i].' lei</td>
			<td align="right">'.($_SESSION['nr_bucati'][$i]*$_SESSION['pret'][$i]).' lei </td>
			</tr>';
			$totalGeneral= $totalGeneral + ($_SESSION['nr_bucati'][$i]*$_SESSION['pret'][$i]);
		}
	}
	//de aici in jos trebuie pus in cos.php
	//afisam totalul general
	print '<tr>
	<td align="right" colspan="3"><b>Total in cos</b></td>
	<td align="right"><b>'.$totalGeneral.'</b> lei</td>
	</tr>';
	?>
	</table>
	<br>
	<input type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" value="Modifica">
	<br><br>
		Introduceți <b>0</b> pentru a goli coșul de cumparături!
	<h2>Continuați</h2>
	<table>
		<tr>
		
			<td width="200" align="center"><img src="cos.jpg">
			<a href="index.php"> <p style="text-align:center; color: blue"> Continuă cumparaturile </p></a></td>
			
			<td width="200" align="center"><img src="casa.jpg">
			<a href="casa.php"> <p style="text-align:center; color: blue"> Efectuează plata </p></a></td>
			
		</tr>
	</table>
</td>
<?php
	include("page_bottom.php");
?>