<?php
	if ($_POST['nume_client'] == "" ||
	$_POST['adresa_email'] == "" ||
	$_POST['comentariu'] == "")
	{
		print "Trebuie sa completati toate campurile";
		exit;
	}
/* Dacă execuţia scriptului a ajuns până aici (adică a trecut cu succes de condiţia de
mai sus) înseamnă că toate câmpurile au fost completate.
Aşadar, se conectează la baza de date, prelucrează informaţiile transmise din
formular şi le introduce în baza de date :*/
	include("conectare.php");
/*folosim din motive de securitate functia strip_tags pentru a elimina tagurile HTML si
PHP din toate stringurile trimise de utilizator. E bine sa folosim aceasta functie pentru a
"curata" inputul utilizatorilor de orice cod potential rauvoitor */
	$nume = strip_tags($_POST['nume_client']);
	$email = strip_tags($_POST['adresa_email']);
	$coment = strip_tags($_POST['comentariu']);
	$sql="INSERT INTO comentarii
	(id_produs, nume_client, adresa_email, comentariu)
	VALUES(".$_POST['id_produs'].",'".$nume."','".$email."','".$coment."')";
	mysqli_query($conn, $sql);
	/* redirectionam utilizatorul catre pagina cartii la care a adaugat un comentariu */
	$inapoi="produs.php?id_produs=".$_POST['id_produs'];
	$id_carte=$_POST['id_produs'];
	header("location: $inapoi");
?>