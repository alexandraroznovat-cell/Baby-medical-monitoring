 if(isset($_POST['sterge_produs']))
 {
   print "<h1>Șterge produs</h1>";

   /* cautam intai o carte in tabela care are titlul si id_autor specificate in 
      formular
   */

   $sqlProdus = "select * from produse where oferta_produs='".$_POST['oferta_produs']."' and
   				    id_producator=".$_POST['id_producator'];
 
   $resursaProdus = mysql_query($sqlProdus);

   /* daca nu s-a gasit nici o carte care sa corespunda datelor introduse atisam 
      un mesaj de eroare 
   */

   if(mysql_num_rows($resursaProdus) == 0)
   {
	print "Aceast produs nu exista in tabela";
   }else{
  	/* iar daca exista atunci extragem id_ul cartii din tabela si il vom folosi 
                intr-un camp ascuns din formularul de confirmare */

   $id_produs = mysql_result($resursaProdus,0,"id_produs");

 ?>

Esti sigur ca vrei sa stergi acest produs ?

<form action="prelucrare_modificare_stergere.php" method="POST">
   <INPUT type="hidden" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="id_produs" value ="<?=$_POST['id_produs']?>">
   <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="sterge_produs" value="Șterge!">
</form>

<?
 }
}
?>