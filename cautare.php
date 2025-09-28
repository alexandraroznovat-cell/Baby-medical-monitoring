<?php
	session_start();
	include("conectare.php");
	include("page_top.php");
	include("meniu.php");
	$cuvant = $_GET['cuvant'];
?>
<td valign="top">
<h1>Rezultatele căutarii</h1>
<p>Textul căutat: <b><?=$cuvant?></b></p>
<b>Producători</b> 
<blockquote>
<?php
$sql = "SELECT id_producator, producator FROM producatori WHERE producator LIKE '%".$cuvant."%'";
$resursa = mysqli_query($conn, $sql);
if(mysqli_num_rows($resursa) ==0) 
{
	print "<i>Nici un rezultat</i>";
}
while($row = mysqli_fetch_array($resursa)) 
{
	$nume_producator = str_replace ($cuvant,"<b>$cuvant</b>", $row['producator']);
	print '<a href="producator.php?id_producator='.$row['id_producator'].'">'.$nume_producator.'</a><br>';
}
?>
</blockquote>
<b>Oferte produse</b> 
<blockquote>
<?php
$sql = "SELECT id_produs, oferta_produs FROM produse WHERE oferta_produs LIKE '%".$cuvant."%'";
$resursa = mysqli_query($conn, $sql);
if(mysqli_num_rows($resursa) == 0)
{
	print "<i>Nici un rezultat</i>";
}
while($row = mysqli_fetch_array($resursa)) 
{
	$oferta_produs = str_replace ($cuvant,"<b>$cuvant</b>",$row['oferta_produs']);
	print '<a href="produs.php?id_produs='.$row['id_produs'].'">'.$oferta_produs.'</a><br>';
}
?>
</blockquote>
<b>Descrieri produs</b>
<blockquote>
<?php
$sql = "SELECT id_produs, oferta_produs, descriere_produs FROM produse WHERE descriere_produs LIKE '%".$cuvant."%'";
$resursa = mysqli_query($conn, $sql);
if(mysqli_num_rows($resursa) == 0) 
{
	print "<i>Nici un rezultat</i>";
}
while($row = mysqli_fetch_array($resursa)) 
{
$descriere_produs = str_replace ($cuvant,"<b>$cuvant</b>", $row['descriere_produs']);
print '<a href="produs.php?id_produs='.$row['id_produs'].'">'.$row['oferta_produs'].
'</a><br>'.$descriere_produs.'<br><br>';
}
?>
</blockquote>
</td>
<?php
	include("page_bottom.php");
?>