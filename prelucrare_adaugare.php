<?php
session_start();
include("autorizare.php");
include("admin_top.php");
include("conectare.php");

if (isset($_POST['adauga_domeniu'])) {
    /*
    inainte de a introduce noul nume de domeniu verificam doua lucruri:
      -campul sa nu fie gol,
      -sa nu existe deja in tabela
    */
    if ($_POST['domeniu_nou'] == "") {
        print 'Trebuie să completați numele domeniului! <br>
        <a href="adaugare.php">Back</a>';
        exit;
    }
    /*verificam daca nu exista deja in tabela*/

    $sql = "select * from domenii where domeniu='" . $_POST['domeniu_nou'] . "'";
    $sursa = mysqli_query($conn, $sql);

    /*interogarea returneaza 0 randuri daca domeniul nu exista in tabela.
      Daca nu returneaza 0 inseamna ca domeniul exista deja in tabela,
      nu-l vom mai introduce inca o data, vom atentiona utilizatorul de eroare
      si vom intrerupe executia scriptului
    */
    if (mysqli_num_rows($sursa) != 0) {
        print 'Domeniul <b>' . $_POST['domeniu_nou'] . '</b> exista deja in baza de date!<br>
               <a href="adaugare.php">Back</a>';
        exit;
    }

    /*adaugam noul nume de domeniu in tabela*/

    $sql = "insert into domenii(domeniu) values('" . $_POST['domeniu_nou'] . "')";
    mysqli_query($conn, $sql);

    /*afisam utilizatorului un mesaj de confirmare*/
    print 'Domeniul <b>' . $_POST['domeniu_nou'] . '</b> a fost adaugat in tabela cu succes!<br>
               <a href="adaugare.php">Back</a>';
    exit;
}

/*acelasi script cu mici diferente il vom folosi pentru a adauga un autor nou*/

if (isset($_POST['adauga_producator'])) {
    /*verificam campul sa nu fie gol*/
    if ($_POST['producator_nou'] == "") {
        print 'Trebuie sa completati numele producatorului! <br>
               <a href="adaugare.php">Back</a>';
        exit;
    }
    /*verificam daca nu exista deja in tabela*/

    $sql = "select * from producatori where producator='" . $_POST['producator_nou'] . "'";
    $sursa = mysqli_query($conn, $sql);
    if (mysqli_num_rows($sursa) != 0) {
        print 'Producătorul <b>' . $_POST['producator_nou'] . '</b> există deja in tabelă!<br>
               <a href="adaugare.php">Back</a>';
        exit;
    }

    /*am verificat sa nu fie erori si putem sa adaugam in tabela*/

    $sql = "insert into producatori(producator) values('" . $_POST['producator_nou'] . "')";
    mysqli_query($conn, $sql);

    /*afisam utilizatorului un mesaj de confirmare*/

    print 'Producătorul <b>' . $_POST['producator_nou'] . '</b> a fost adăugat în tabelă!<br>
               <a href="adaugare.php">Back</a>';
    exit;
}

/*
  scriptul pentru adaugarea produsului va fi un pic mai complicat deoarece trebuie sa facem 
  mai multe verificari la nivel de variabile  
*/

if (isset($_POST['adauga_produs'])) {
    /*verificam daca oferta_produs, descrierea sau pretul nu sunt goale*/

    if ($_POST['oferta_produs'] == "" || $_POST['descriere_produs'] == "" || $_POST['pret'] == "" ) {
        print 'Trebuie sa completați toate câmpurile: oferta_produs, descriere_produs, preț! <br><a href="adaugare.php">Back</a>';
        exit;
    }

    /*verificam daca valoarea introdusa in campul pret este de tip numeric*/

    if (!is_numeric($_POST['pret'])) {
        print 'Câmpul preț trebuie să fie de tip numeric!<br>
	         <a href="adaugare.php">Back</a>';
        exit;
    }

    /*verificam daca aceasta carte nu exista deja in tabela*/

    $sql = "select * from produse where id_producator='" . $_POST['id_producator'] . "' and oferta_produs='" . $_POST['oferta_produs'] . "'";
    $sursa = mysqli_query($conn, $sql);
    if (mysqli_num_rows($sursa) != 0) {
        print 'Aceast produs exista deja in baza de date! <br>
		<a href="adaugare.php">Back</a>';
        exit;
    }

    /*am verificat sa nu existe erori, deci putem adauga carti in baza de date*/

    $sql = "insert into produse(id_producator,oferta_produs,descriere_produs,pret,datai,id_domeniu) VALUES(
						     '" . $_POST['id_producator'] . "',
						     '" . $_POST['oferta_produs'] . "',
						     '" . $_POST['descriere_produs'] . "',
						     '" . $_POST['pret'] . "',
						     '" . $_POST['datai'] . "',
						     '" . $_POST['id_domeniu'] . "')";
    mysqli_query($conn, $sql);

    /*afisam utilizatorului un mesaj de confirmare*/

    print 'Produsul a fost adăugat în tabelă!<br>
	  	 <a href="adaugare.php">Back</a>';
    exit;
}
?>
</body>
</html>