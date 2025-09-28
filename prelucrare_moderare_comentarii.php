<?php
  session_start();
  include("conectare.php");
  include("autorizare.php");
  include("admin_top.php");

/* modificare nume domeniu */ 

if(isset($_POST['modifica']))
{
  /* Verifica sa fie completate campurile */ 
  if($_POST['nume_client']=="")
  {
 	print "Nu ati completat numele clientului !";
  }
   else if($_POST['adresa_email']=="")
	{
		print "NU ati completat adresa de Email";
	}
	 else if($_POST['comentariu']=="")
		{
			print "campul comentariu este gol";
		}
  else
      {
           /*campurile fiind completate sa facem modificarea in tabela*/
		 //pentru cazul in care apare ' sau " folosim mysql_real_escape_string  
		$comentariu=$_POST['comentariu'];
		$comentariu = mysqli_real_escape_string($conn, $comentariu);
	   $sql = "update comentarii set nume_client='".$_POST['nume_client']."',
     		                            adresa_email='".$_POST['adresa_email']."',
										comentariu='".$comentariu."' 
										where id_comentariu=".$_POST['id_comentariu'];
	     mysqli_query($conn, $sql);
 		/*print '<br>'.$sql.'<br>';*/
 	     print "comentariul a fost modificat!";
      }
}

/* sterge comentariu */

if(isset($_POST['sterge']))
{
   $sql="delete from comentarii where id_comentariu=".$_POST['id_comentariu'];
   mysqli_query($conn, $sql);
   print "Comentariul a fost șters cu succes!";
}

/* setarea ultimului comentariu moderat din tabela admin */ 

if(isset($_POST['seteaza_moderate']))
{
	$sql="update admin set ultimul_comentariu_moderat=".$_POST['ultimul_id'];  
	mysqli_query($conn, $sql);
	print "Comentariul(Comentariile) au fost moderate cu succes!";
}
?> 

</body>
</html>
