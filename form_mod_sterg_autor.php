	<form action="prelucrare_modificare_stergere.php" method="POST">
	<table>
  	<tr>
      	  <td>Domeniu</td>
      	  <td><SELECT name="id_domeniu">

          <?

           /* Luam numele de domenii din tabela si Ie afisam utilizatorului intr-o lista drop-   
              down. Obscrvati folosirea lui if pentru a alisa ca selectat domeniul de care apartine  
              cartea
           */

           $sql1 = "select * from domenii order by domeniu";
           $resursa1 = mysqli_query($conn,$sql1);

           while($row=mysqli_fetch_array($resursa1))
           {
	      if($row['id_domeniu'] == $rowLaptop['id_domeniu'])
	      {
		print '<option SELECTED value="'.$row['id_domeniu'].'">'
                                                .$row['domeniu']
			.'</option>';
              }else{
		print '<option value="'.$row['id_domeniu'].'">'
				       .$row['domeniu']
			.'</option>';
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
          
        <?

        /* Afisam si lista dropdown cu autori */

        $sql2 = "select * from producatori order by producator";
        $resursa2 = mysqli_query($conn,$sql2);
        while($row = mysqli_fetch_array($resursa2))
        {
   	   if($row['id_producator'] == $rowProdus['id_producator'])
	   {
      		print '<option SELECTED value="'.$row('id_producator'].'">'
					        .$row['producator']
                     .'</option>';
   	   }else{
		print '<option value="'.$row['id_producator'].'">'
				       .$row['producator']
		     .'</option>';
   	   }
        }

        ?> 

        </select>
      </td> 
     </tr> 
     <tr> 
         <td><label for="model">Model:</label></td>
      <td> 
         <input type="text" id="model" name="titlu" value="<?=$rowLaptop['model']?>">
      </td>
     </tr> 
     <tr> 
      <td style="vertical-align: top"><label for="descriere"> Descriere:</label> </td>
      <td><textarea id= "descriere" name = "descriere" rows="8"><?=$rowLaptop['descriere']?>
          </textarea>
      </td>
     </tr> 
     <tr> 
         <td><label for="pret">Preț:</label></td>
      <td>
	<input  id="pret" type="text" name="pret" value="<?=$rowLaptop['pret']?>">
      </td>
     </tr>
   </table> 
    <INPUT type="hidden" name="id_laptop" value="<?=$rowLaptop['id_laptop']?>">
    <INPUT type="submit" name="modifica_laptop" value="Modifica">
 </form>