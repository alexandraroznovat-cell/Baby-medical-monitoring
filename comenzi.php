<?php
 session_start();
 include("conectare.php");
 include("admin_top.php");
?>

<h2>Comenzi</h2>
<b>Comenzi neonorate</b>
<?php
/* Afli   lista comenzilor neonorate (WHERE comanda_onorata=0) din
   tabelul tranzactii 
*/

$sqlTranzactii = "select id_tranzactie, DATE_FORMAT(data_tranzactie,'%d-%m-%y')
                 as data_tranzactie, nume_client, adresa_client from tranzactii where comanda_onorata=0";

/*DATE_FORMAT este o func?? a MySQL cu care putem formata o dat?tocat?ntr-un
timestamp dup?um dnrim
 (?cazul de fa? zz-ll-aaaa). Func??nu modific?imic in tabela ci doar
afi  eaz?n TIMESTAMP intr-un 
 format mai u  or digerabil (04-3-2003 ?loc de 20030304) 
*/

$resursaTranzactii = mysqli_query($conn, $sqlTranzactii);
while($rowTranzactie = mysqli_fetch_array($resursaTranzactii))
{
   $totalGeneral = 0;                
?>

<form action="prelucrare_comenzi.php" method="POST">
 Data comenzii:

 <b><?=$rowTranzactie['data_tranzactie']?></b>
 <div style="width:500px; border:1px solid #ffffff; background-color #F9F1E7;
padding:5px">

 <b><?=$rowTranzactie['nume_client']?></b><br>
    <?=$rowTranzactie['adresa_client']?>

 <TABLE border="1" cellpadding="4" cellspacing="0">
  <tr>
    <td style="text-align: center"><b>Producător</b></td>
	<td style="text-align: center"><b>Oferat_produs</b></td>
    <td style="text-align: center"><b>Nr_bucati</b></td>
    <td style="text-align: center"><b>Preț</b></td>
    <td style="text-align: center"><b>Total</b></td>
  </tr>

<?php


  $sqlProduse = "select oferta_produs,producator,pret,nr_bucati from vanzari,produse,producatori 
                        where produse.id_produs=vanzari.id_produs and 
                        produse.id_producator=producatori.id_producator and 
                        id_tranzactie=".$rowTranzactie['id_tranzactie'];
 
  $resursaProduse=mysqli_query($conn, $sqlProduse); 

        

  while($rowProdus=mysqli_fetch_array($resursaProduse))
  { 
        print '<tr><td>'.$rowProdus['producator'].'</td>';
		print '<td>'.$rowProdus['oferta_produs'].'</td>';
        print '<td style="text-align: right">'.$rowProdus['nr_bucati'].'</td>';
        print '<td style="text-align: right">'.$rowProdus['pret'].'</td>';

/* 62 Calculam totalul pentru aceast?arte (pre??nr_buc)*/

  $total=$rowProdus['pret']*$rowProdus['nr_bucati'];

/* Afisam acest total   i apoi il adunam la totalul general pentru aceast?omanda. */

  print '<td style="text-align: right">'.$total.'</td></tr>';

  $totalGeneral = $totalGeneral + $total;

  }

?>

 <tr><td  colspan="4" style="text-align: right">Total comanda</td>
     <td><?=$totalGeneral?> lei </td> 
 </tr> 
</table>

 <input type="hidden" name="id_tranz"  value="<?=$rowTranzactie['id_tranz']?>">
 <input type="submit" name="comanda_onorata" value="Comanda onorată" style="margin-top: 10px">
 <input type="submit" name="anuleaza_comanda" value="Anulează comanda" style="margin-top: 10px">
</div> 
</form> 

<?php
}
?>
</body>
</html>
 

