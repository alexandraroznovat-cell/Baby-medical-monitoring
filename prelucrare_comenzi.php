<?php
 session_start();
 include("autorizare.php"); 
 include("admin_top.php");
 include("conectare.php");
 print ("<h2>Comenzi</h2>"); 

 /* comanda a fost onoratã*/
 if(isset($_POST['comanda_onorata']))
{
	 /*setãm câmpul comanda_onorata în tabela tranzacþii pentru aceastã comandã */
	$sql = "update tranzactii set comanda_onorata=1 where id_tranzactie=".$_POST['id_tranzactie'];
	mysqli_query($conn, $sql);
	/* si afisam un mesaj*/

	print "Comanda a fost onorata"; 
}

/* comanda a fost anulatã */

if(isset($_POST['anuleaza_comanda']))
{
	/* Stergem tranzactia (din tabelul tranzacti.) si cãrtile comandate (din tabelul vanzari)*/

	$sqlTranzactii = "delete from tranzactii where id_tranzactie=".$_POST['id_tranzactie']; 
	mysqli_query($conn, $sqlTranzactii); 

	$sqlCarti = "delete from vanzari where id_tranzactie=".$_POST['id_tranzactie'];
	mysqli_query($conn, $sqlCarti);

	 /* si afisam un mesaj*/

	print "Comanda a fost anulata!"; 
}
?>
</body> 
</html>
