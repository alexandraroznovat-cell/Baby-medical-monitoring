<?php
	session_start();
	include ("conectare.php");
	include ("page_top.php");
	include ("meniu.php");
	
	$id_domeniu=$_GET['id_domeniu'];
	$sqlNumeDomeniu="SELECT domeniu FROM domenii WHERE id_domeniu =".$id_domeniu;
	$sursaNumeDomeniu = mysqli_query($conn, $sqlNumeDomeniu);
	/* mysql_query execută interogarea dar nu afişează rezultatul ci returnează o
	valoare: TRUE dacă interogarea a fost efectuată cu succes sau FALSE. dacă aceasta a
	eşuat Pentru a afişa valori din cadrul resursei returnate putem folosi mysql_result.
	Parametrii funcţiei mysql_result sunt: interogarea ($resursaNumeDomeniu), rândul (0,
	primul rând al tabelului (numerotarea începe de la 0), 1 rândul al doilea al tabelului,
	etc...) şi numele câmpului ("domeniu");*/
	$row=mysqli_fetch_array($sursaNumeDomeniu);
	$numeDomeniu = $row['domeniu'];
?>
<td valign="top">
<h3>Domeniu: <?=$numeDomeniu?></h3>
<b>Produse din domeniul: <u><b><?=$numeDomeniu?></b></u></b>
<table cellpadding="5">
<?php
	$sql="SELECT id_produs, oferta_produs, descriere_produs, pret, producator
	FROM produse, producatori, domenii
	WHERE produse.id_domeniu=domenii.id_domeniu AND
	produse.id_producator=producatori.id_producator AND
	domenii.id_domeniu = ".$id_domeniu;
	$sursa = mysqli_query($conn, $sql);
	/*mysql_result este greoi de folosit deoarece suntem nevoiţi să accesăm fiecare
	coloană a fiecărui rând în parte. Dar, putem accesa resursa ca un array numeric cu
	ajutorul functiei mysql_fetch_array, functie cu care putem accesa valorile din tabelul
	returnat în interogare dintr-un array*/
	while($row = mysqli_fetch_array($sursa))
	{
?>
		<tr>
		<td align = "center" style="width: 150px;">
<?php
		$adrimag="coperte/".$row['id_produs'].".jpg";
		if (file_exists($adrimag))
		{
			$adrimag="coperte/".$row['id_produs'].".jpg";
		    print '<img src="'.$adrimag.'" width="75" height="100"><br>';
		}
		else
		{
			/*daca nu exista fis specificat afisam layerul DIV in care scrie "fara imagine"*/
			print '<div style="width:75px; border: 1px black solid;
			background-color:#cccccc">fara imagine</div>';
		}
?>
		</td>
		<td>
			<b><a href="produs.php?id_produs=<?=$row['id_produs']?>">
			<?=$row['oferta_produs']?></a></b><br>
			<span>de:&nbsp;</span><?=$row['producator']?><br>
			preț: <?=$row['pret']?> lei
		</td>
		</tr>
<?php
	}
?>
</table>
</td>
<?php
	include ("page_bottom.php");
?>