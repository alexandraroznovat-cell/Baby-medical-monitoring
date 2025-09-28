<?php
session_start();
include("autorizare.php");
include("admin_top.php");
include("conectare.php");
$id_comentariu = $_POST['id_comentariu'];
/* formular modificare comentariu*/

if (isset($_POST['modifica'])) {

    $sql = "select * from comentarii where id_comentariu='$id_comentariu'";

    $resursa = mysqli_query($conn, $sql);

    /*fiind returnat un singur rand, nu folosim while */

    $row = mysqli_fetch_array($resursa);
    ?>

    <h1>Modifica</h1>
    <b>Modifica acest comentariu</b>

    <form action="prelucrare_moderare_comentarii.php" method="POST">
        <label for="nume">Nume:</label>
        <input type="text" id="nume" name="nume_utilizator" value="<?php
        echo $row['nume_utilizator']; ?>"><br>
        <label for="email">Email:</label>
        <input id="email" type="text" name="adresa_email" value="<?php echo $row['adresa_email']; ?>">
        <br>
        <label for="comentariu">Comentariu:</label> <br>
        <textarea id="comentariu" name="comentariu" cols="35" rows="8"><?php echo $row['comentariu']; ?>
        </textarea><br><br>

        <input type="hidden" name="id_comentariu" value="<?php echo $id_comentariu; ?>">
        <input type="submit"style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="modifica" value="Modifica">
    </form>

    <?php

}
/* confirmare stergere comentariu */

if (isset($_POST['sterge'])) {

    ?>

    <h1>Șterge</h1>

    Ești sigur că vrei să ștergi acest comentariu?

    <form action="prelucrare_moderare_comentarii.php" method="POST">
        <input type="hidden" name="id_comentariu" value="<?= $_POST['id_comentariu'] ?>">
        <input type="submit"style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="sterge" value="Sterge">
    </form>

    <?php

}

/* confirmare moderare*/

if (isset($_POST['seteaza_moderate'])) {

    ?>

    <h1>Setează comentariile ca fiind moderate</h1>

    Ești sigur că vrei să setezi comentariile din pagina precedenta ca fiind
    moderate?<br>
    Le-ai verificat pe toate?

    <form action="prelucrare_moderare_comententarii.php" method="POST">
        <input type="hidden" name="ultimul_id" value="<?= $_POST['ultimul_id'] ?>">
        <input type="submit"style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="seteaza_moderare" value="Da!">
    </form>

    <?php

}

?>

</body>
</html>

