<?php
	session_start();
	include("conectare.php");
	include("page_top.php");
	include("meniu.php");
	
	$id_produs=$_GET['id_produs'];
	$sql="SELECT oferta_produs, producator, descriere_produs, pret FROM produse, producatori
	WHERE id_produs=".$id_produs." AND produse.id_producator=producatori.id_producator";
	$resursa = mysqli_query($conn, $sql);
	/* deoarece interogarea returneaza un singur rand, nu vom folosi while pentru a itera prin
	toate elementele array_ului ci le vom accesa direct */
	$row = mysqli_fetch_array($resursa);
?>
<td valign="top">
<table>
<tr>
<td valign="top">
<?php
	$adrimag="coperte/".$id_produs.".jpg";
	if (file_exists($adrimag))
	{	
		$adrimag="coperte/".$id_produs.".jpg";
	    print '<img src="'.$adrimag.'" width="75" height="100"><br>';
	}
	else
	{
		/*daca nu exista fisierul specificat afisam layerul DIV in care scrie "fara imagine"*/
		print '<div style="width:75px; height:100px; border: 1px black solid;
		background-color: #cccccc">fara imagine</div>';
	}
?>
	</td>
	<td valign="top">
	<h1><?=$row['oferta_produs']?></h1>
	de: <b><?=$row['producator']?></b>
	<p> <?=$row['descriere_produs']?></p>
	<p>preț: <?=$row['pret']?> lei </p>
	</td>
	</tr>
	</table>
	<form action="cos.php?actiune=adauga" method="POST">
		<input type="hidden" name="id_produs" value="<?=$id_produs?>">
		<input type="hidden" name="oferta_produs" value="<?=$row['oferta_produs']?>">
		<input type="hidden" name="producator" value="<?=$row['producator']?>">
		<input type="hidden" name="pret" value="<?=$row['pret']?>"><br>
		<input type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" value="Cumpara acum!">
	</form>
	<p><b>Opiniile cititorilor</b></p>
<?php
	$sqlComent="SELECT * FROM comentarii WHERE id_produs =" . $id_produs;
	$sursaComent = mysqli_query($conn, $sqlComent);
	while ($row = mysqli_fetch_array($sursaComent))
	{
		print ' <div style = "width:400px; border:1px solid #ffffff;
		back-ground-color:#F9F1E7; padding:5px">
		<a href="mailto : ' .$row['adresa_email'] . ' "> '
		.$row['nume_client'] . '</a><br><br>'
		.$row['comentariu'] . '</div> ';
	}
?>
	<br>
	<div style="width:400px; border:1px solid #632415;
	back-ground-color:#D6DBDF; adding:5px">
	<b><center>Adaugă opinia ta</center></b>
	<hr size="1">
	<form action="adauga_comentariu.php" method="POST">
	Nume: <input type="text" name="nume_client"><br><br>
	Email: <input type="text" name="adresa_email"><br><br>
	Comentariu: <br>
	<textarea name="comentariu" cols="45"></textarea>
	<br><br>
	<input type="hidden" name="id_produs" value="<?=$id_produs?>">
	<center>
	<input type ="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" value="Adauga">
	</center>
	</form>
	</div>
	</td>
<?php
	include("page_bottom.php");
?>