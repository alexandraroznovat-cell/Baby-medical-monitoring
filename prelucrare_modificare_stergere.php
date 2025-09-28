<?php
session_start();
include("autorizare.php");
include("admin_top.php");
include("conectare.php");

/* modificare nume domeniu */

if (isset($_POST['modifica_domeniu'])) {
    /* Verificam daca noul nume de domeniu a fost introdus. */
    if ($_POST['domeniu'] == "") {
        print "Nu ati introdus numele domeniului ! ";
    } else {
        $sql = "update domenii set domeniu='" . $_POST['domeniu'] . "' 
				where id_domeniu=" . $_POST['id_domeniu'];
        mysqli_query($conn, $sql);
        /*print '<br>'.$sql.'<br>';*/
        print "numele domeniului a fost modificat!";
    }

    /* De ce nu am folosi exit in structura if(conditie) {codul de executat; exit}; ? Pentru
    ca, daca nu se executa codul din if (conditie) {} , se executa codul din else {} si atunci
    exit ar fi superfluu. */
}

/* stergere domeniu */

if (isset($_POST['sterge_domeniu'])) {
    $sql = "delete from domenii where id_domeniu=" . $_POST['id_domeniu'];
    mysqli_query($conn, $sql);
    print "Domneiul a fost sters!";
}

/* modificare nume autor */

if (isset($_POST['modifica_producator'])) {
    /* Verificam daca numele modificat a1 autorului a fost introdus. */

    if ($_POST['producator'] == "") {
        print "Nu ati introdus numele producatorului";
    } else {
        $sql = "update producatori set producator='" . $_POST['producator'] . "'  
                                where id_producator=" . $_POST['id_producator'];
        mysqli_query($conn, $sql);
        print "Numele producatorului a fost modificat!";
    }
}

/* Stergere autor */

if (isset($_POST['sterge_producator'])) {
    $sql = "delete from producatori where producator=" . $_POST['id_producator'];
    mysqli_query($conn, $sql);
    print "Producatorul a fost sters!";
}

/* Modificare informatii carte */

if (isset($_POST['modifica_produs'])) {
    /* Verificam daca toate datele au fost introduse corect. N-am vrea sa
    introducem date eronate in tabela doar pentru ca a sarit pisica pe
    tastatura si a apasat ENTER in timp ce introduceam datele. Daca, credeti
    nu vi se poate intampla ... ei bine, din proprie experienta va spun ca se
    ca poate. Vom folosi o structura  if  ... else if ... else: */

    if ($_POST['oferta_produs'] == "") {
        print "Nu ati introdus numele ofertei !";
    } else if ($_POST['descriere_produs'] == "") {
        print "Nu ati introdus descrierea !";
    } else if ($_POST['pret'] == "") {
        print "Nu ati introdus pretul !";
    } else if (!is_numeric($_POST['pret'])) {
        print "Pretul trebuie sa fie numeric! Scrieti <b>1000</b>, nu <b>1000 lei</b>!";
    } else {
        $sql = "update produse set 
			id_domeniu=" . $_POST['id_domeniu'] . ",
			id_producator=" . $_POST['id_producator'] . ",
			oferta_produs='" . $_POST['oferta_produs'] . "',
			descriere_produs='" . $_POST['descriere_produs'] . "',
			pret=" . $_POST['pret'] . "
			where id_produs=" . $_POST['id_produs'];
        /*print '<br>'.$sql.'<br>';*/
        mysqli_query($conn, $sql);
        print "Informaliiile au fost modificate!";
    }
}

/* Stergere carte */

if (isset($_POST['sterge_produs'])) {
    $sqlCarte = "delete from produse where id_produs=" . $_POST['id_produs'];
    mysqli_query($conn, $sqlProdus);
    $sqlComentarii = "delete from comentarii where id_produs=" . $_POST['id_produs'];
    mysqli_query($conn, $sqlComentarii);
    print "Produsul a fost șters din tabela!";
}

?>

</body>
</html>
