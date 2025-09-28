
 if(isset($_POST['sterge_domeniu']))
 {
   /* verificam daca sunt carti in tabela care apartin acestui domeniu */

   $sql = "select oferta_produs,producator from produse,producatori,domenii
		where produse.id_domeniu=domenii.id_domeniu and
                      produse.id_producator=".$_POST['id_producator'];
   $resursa = mysql_query($sql);
   $nrProduse = mysql_num_rows($resursa);

   /* daca sunt carti apartinand acestui domeniu afisam lista lor si un mesaj de eroare */

   if($nrProduse > 0)
   {
	print "<p>Sunt $nrProduse produse care apartin acestui domeniu</p>";
	while($row = mysql_fetch_array($resursa))
	{
  			print "<b>".$row['oferta_produs']."</b> de ".$row['producator']."<br>";
	}
	print "<p>Nu puteti sterge acest domeniu </p>";

	/* iar daca nu sunt carti in acest domeniu cerem confitmarea pcntru ,tergere: */
 }else{

?>

<h1>Sterge nume domeniu</h1> 
	esti sigur ca vrei sa stergi acest domeniu?
<form action="prelucrare_modificare_stergere.php" method="POST">
   <INPUT type="hidden" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="id_domeniu" value="<?=$_POST['id_domeniu']?>">
   <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="sterge_domeniu" value="Sterge!"> 
</form>

<?
 }
}
?>