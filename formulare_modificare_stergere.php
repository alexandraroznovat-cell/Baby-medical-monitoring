<?php
 session_start();
 include("autorizare.php"); 
 include("admin_top.php");
 include("conectare.php");

 /* Modifica/sterge domeniu 

  modificare nume domeniu */

 if(isset($_POST['modifica_domeniu']))
 {
   /* luam numele de domeniu din tabela deoarece ne-a fost trimis din formular doar  
      id_ul domeniului: 
   */

   $sql= "select domeniu from domenii where id_domeniu='".$_POST['id_domeniu']."'";
   $resursa = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($resursa);
   $domeniu=$row['domeniu'];

   /* si afisam numele vechi de domeniu intr-un textbox pentru a fi modificat*/

?>

<h1>Modifică nume domeniu</h1>

<form action="prelucrare_modificare_stergere.php" method="POST">
    <INPUT id="domeniu" type="text" name="domeniu" value="<?=$domeniu?>">
    <INPUT type="hidden" name="id_domeniu" value="<?=$_POST['id_domeniu']?>">
    <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="modifica_domeniu" value="Modifica">
</form>

<?php

}

/*   Sterge domeniu */

/*include("sterge_domeniu.php");*/

 if(isset($_POST['sterge_domeniu']))
 {
   /* verificam daca sunt carti in tabela care apartin acestui domeniu */

   $sql = "select oferta_produs, producator from produse,producatori,domenii
		where produse.id_domeniu=domenii.id_domeniu and 
                      produse.id_producator=producatori.id_producator and 
		      domenii.id_domeniu=".$_POST['id_domeniu'];
      
   $resursa = mysqli_query($conn, $sql);   
   $nrProduse = mysqli_num_rows($resursa);

   /* daca sunt carti apartinand acestui domeniu afisam lista lor si un mesaj de eroare */

   if($nrProduse > 0)
   {
	print "<p>Sunt $nrProduse produse care aparțin acestui domeniu</p>";
	while($row = mysqli_fetch_array($resursa))
	{
  			print "<b>".$row['producator']."  ".$row['oferta_produs']."<br></b>";
	}
      print "<p>Nu puteți șterge aceast domeniu! </p>";
   }
      /* iar daca nu sunt carti in acest domeniu cerem confirmarea pcntru stergere: */
    else{

?>

<h1>Șterge nume domeniu</h1>

	Ești sigur că vrei să ștergi aceast domeniu?

<form action="prelucrare_modificare_stergere.php" method="POST">
   <INPUT type="hidden" name="id_domeniu" value="<?=$_POST['id_domeniu']?>">
   <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="sterge_domeniu" value="Sterge!">
</form>

<?php
 }
}


 /*modifica/sterge autor

  modificare nume autor */ 

 if(isset($_POST['modifica_producator']))
 {
   /* luam numele autorului din tabela deoarece ne-a fost trimis 
     din formular doar id_autor: 
   */

  $sql = "select producator from producatori where id_producator='".$_POST['id_producator']."'";
  $resursa = mysqli_query($conn, $sql); 
  $row = mysqli_fetch_assoc($resursa);
  $producator=$row['producator'];

  /* si afisam numele autorului intr-un textbox pentru a fi modificat */

?>

<h1>Modifică nume producator</h1>

<form action="prelucrare_modificare_stergere.php" method="POST">
   <INPUT type="text" name="producator" value="<?=$producator?>">
   <INPUT type="hidden" name="id_producator" value="<?=$_POST['id_producator']?>">
   <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="modifica_producator" value="Modifica">
</form>

<?php
 }

 /* Sterge autor */

  if(isset($_POST['sterge_producator']))
  {
      /*verificam daca sunt carti in tabela care apartin acestui autor: */
     
     $sql = "select oferta_produs from produse, producatori where produse.id_producator=producatori.id_producator and
				 produse.id_producator=".$_POST['id_producator'];
     $resursa = mysqli_query($conn, $sql);
     $nrLaptopuri = mysqli_num_rows($resursa);

     /* daca sunt carti apartinand acestui autor, afisam lista lor si un mesaj de eroare: */

    if($nrProduse > 0)
    {
	print "<p>Sunt $nrProduse produse cu acesta oferta_produs în tabelă!</p>";
	while($row = mysqli_fetch_array($resursa))
	{
   		print $row['oferta_produs']."<br>";
	}

	print "<p>Nu puteți șterge acesta oferta produs!</p>";

    } 
    /* iar daca nu sunt carti scrise de acest autor cerem confirmarea pentru stergere */

    else
	{

?> 

<h1>Șterge producător</h1>

	Ești sigur că vrei să ștergi acest titlu?

<form action="prelucrare_modificare_stergere.php" method="POST">
   <INPUT type="hidden" name= "id_producator" value="<?=$_POST['id_producator']?>">
   <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="sterge_producator" value="Sterge!">
</form>

<?php
 }
}

  /*modifica/sterge carte
  modificare nume carte */ 

 if(isset($_POST['modifica_produs']))
 {
      print "<h1>Modificare produse</h1>";

      /* cautam intai o carte care are titlul si id_autor specificate in formular*/

      $sqlProdus="select * from produse, producatori where produse.oferta_produs='".$_POST['oferta_produs']."' and 
					 producatori.id_producator=".$_POST['id_producator'];
      $resursaProdus=mysqli_query($conn, $sqlProdus);

      /*daca nu s-a gasit nici o carte care sa corepunda datelor introduse, 
	afisam un mesaj de eroare*/

      if(mysqli_num_rows($resursaProdus) == 0)
      {
		print "Acest produs nu există in tabelă";
      }
	  else
	  {

        /* daca exista, atunci extragem informatiile din resursa, le punem intr-un array 
	  (nu folosim while deoarece este returnat un singur rand!) si le afisam in 
	  formular pentru a fi modificate*/

        $rowProdus = mysqli_fetch_array($resursaProdus);
	/*print_r($rowCarte);*/
?> 
	<form action="prelucrare_modificare_stergere.php" method="POST">
	<table>
  	<tr>
        <td><label for="id_domeniu">Domeniu:</label></td>
      	  <td><SELECT id="id_domeniu" name="id_domeniu">
          <?php
           /* Luam numele de domenii din tabela si Ie afisam utilizatorului intr-o lista drop-   
              down. Observati folosirea lui if pentru a afisa ca selectat domeniul de care apartine  
              cartea
           */

           $sql="select * from domenii order by domeniu";
		   $resursa = mysqli_query($conn, $sql);
           while($row=mysqli_fetch_array($resursa))
           {
				if($row['id_domeniu'] == $rowProdus['id_domeniu'])
				{
					print '<option SELECTED value="'.$row['id_domeniu'].'">'.$row['domeniu'].'</option>';
				}
				else
				{
					print '<option value="'.$row['id_domeniu'].'">'.$row['domeniu'].'</option>';
				}
           }

          ?>

    	 </select>
       </td> 
      </tr> 
      <tr> 
          <td><label for="id_producator">Producător:</label></td>
       <td>
        <select name="id_producator" id="id_producator">
          
        <?php

        /* Afisam si lista dropdown cu autori */

        $sql = "select * from producatori order by producator";
        $resursa = mysqli_query($conn, $sql); 
        while($row = mysqli_fetch_array($resursa))
        {
		   if($row['id_producator'] == $rowProdus['id_producator'])
		   {
				print '<option SELECTED value="'.$row['id_producator'].'">'.$row['producator'].'</option>';
		   }
		   else
		   {
				print '<option value="'.$row['id_producator'].'">'.$row['producator'].'</option>';
		   }
        }

        ?> 

        </select>
      </td> 
     </tr> 
     <tr> 
         <td><label for="producator">Oferta produs:</label></td>
      <td> 
         <INPUT id="producator" type="text" name="pferta_produs" value="<?=$rowProdus['oferta_produs']?>">
      </td>
     </tr>
<tr> 
      <td style= "vertical-align: top"><label for="descriere_produs"> Descriere: </label></td>
      <td><textarea id="descriere_produs" name = "descriere_produs" rows="8"><?=$rowProdus['descriere_produs']?>
          </textarea>
      </td>
     </tr> 
     <tr> 
         <td><label for="pret">Pret:</label></td>
      <td>
	<INPUT id="pret" type="text" name="pret" value="<?=$rowPret['pret']?>">
      </td>
     </tr>
   </table> 
    <INPUT type="hidden" name="id_produs" value="<?=$rowProdus['id_produs']?>">
    <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="modifica_produs" value="Modifica">
 </form>

 <?php
 }
}
 /* si in final stergere carte */

 if(isset($_POST['sterge_produs']))
 {
   print "<h1>Șterge produs</h1>";

   /* cautam intai o carte in tabela care are titlul si id_autor specificate in 
      formular
   */

   $sqlProdus = "select * from produse where oferta_produs='".$_POST['oferta_produs']."' and 
   				    id_producator=".$_POST['id_producator'];
 
   $resursaProdus = mysqli_query($conn, $sqlProdus);

   /* daca nu s-a gasit nici o carte care sa corespunda datelor introduse afisam 
      un mesaj de eroare 
   */

   if(mysqli_num_rows($resursaProdus) == 0)
   {
		print "Acest produs nu există in tabelă";
   }
   else
   {
        /* iar daca exista atunci extragem id_ul cartii din tabela si il vom folosi 
        intr-un camp ascuns din formularul de confirmare */

		$row = mysqli_fetch_assoc($resursaProdus);
		$id_produs=$row['id_produs'];
   ?>

  Ești sigur ca vrei sa ștergi acest produs ?

  <form action="prelucrare_modificare_stergere.php" method="POST">
    <INPUT type="hidden" name="id_produs" value="<?=$id_produs?>">
    <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey"name="sterge_produs" value="Sterge!">
  </form>

<?php
 }
}
?>

</body>
</html>
