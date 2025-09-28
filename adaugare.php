<?php
  session_start();
  include("autorizare.php");
  include("admin_top.php");
  include("conectare.php")
?>

<h2>Adăugare</h2>

 <b>Adaugă Domeniu</b>
  <form action="prelucrare_adaugare.php" method="POST">
   Domeniu nou: <INPUT type="text" name="domeniu_nou">
	         <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="adauga_domeniu" value="Adauga">
  </form>
 
 	<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
	<br>
 <b>Adaugă Producător</b>
  <form action="prelucrare_adaugare.php" method="POST">
     Producător nou: <INPUT type="text" name="producator_nou">
	         <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="adauga_producator" value="Adauga">
  </form>

 	<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
	<br>
 <b>Adaugă Produs</b>
  <form action="prelucrare_adaugare.php" method="POST">
   <table>
    <tr>
     <td><label for="id_domeniu">Domeniu</label></td>
     <td>
     <select name="id_domeniu" id="id_domeniu">
	/*luam numele de domenii din tabela si le afisam utilizatorului intr_o 
	lista drop_down. Putem astfel obtine un id_domeniu corespunzator 
	domeniului selectat pe care sa-l introducem in tabelul produsului
	*/
      <?php
        $sql="select * from domenii order by domeniu";
        $sursa=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($sursa))
		{
			print '<option value="'.$row['id_domeniu'].'">'.$row['domeniu'].'</option>';
        }
      ?>
     </select>
    </td>
   </tr>

   <tr>
       <td><label for="id_producator">Producător:</label></td>
     <td>
     <select name="id_producator" id="id_producator">
	/*afisam lista drop_down cu producatori*/
      <?php
        $sql="select * from producatori order by producator";
        $sursa=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($sursa))
        {
			print '<option value="'.$row['id_producator'].'">'.$row['producator'].'</option>';
        }
      ?>
     </select>
    </td>
   </tr>

   <tr>
       <td><label for="oferta_produs">Oferta_produs:</label></td>
     <td><input type="text" name="oferta_prosdus" id="oferta_produs"></td>
    </tr>
    <tr>
        <td style="vertical-align:top;"><label for="descriere_produs">Descriere:</label> </td>
     <td><textarea name="descriere_produs" id="descriere_produs" rows="8">
         </textarea>
     </td>
    </tr>
    
	<tr>
     <td><label for="datai">Data:</label></td>
     <td><input type="date" name="datai" id="datai"></td>
    </tr>
	
    <tr>
        <td><label for="pret">Preț:</label></td>
     <td><input id="pret" type="text" name="pret"></td>
    </tr>
    <tr>
     <td></td>
     <td><input type="submit"style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="adauga_producator" name="adauga_produs" value="Adauga"></td>
    </tr>
   </table>
  </form>
 </body>
</html>