<?php
session_start();
include("autorizare.php");
include("admin_top.php");
include("conectare.php");
?>

<h2>Modificare sau ștergere</h2>

<p><b>Notă:</b>Nu veți putea șterge domenii care au produse in ele.<br>Înainte de a șterge domeniul,
    modificați produsele din ea astfel încât să aparțină altor domenii. <br>
    De asemenea nu veți putea șterge un producător dacă exista produse in tabele care aparțin acelui producător.
</p>

<div style="width:600px; border:3px solid #632415; 
   background-color:#F9F1E7; padding:5px">

    <b>Selectează domeniul pe care dorești să-l modifici sau să-l ștergi:</b>
    <hr>

    <form action="formulare_modificare_stergere.php" method="POST">
        <label for="domeniu">Domeniu:</label>
        <select name="id_domeniu" id=domeniu"">

            /* luam numele de domenii din tabela si le afisam utilizatorului intr-o lista drop-
            down. Astfel putem obtine un id_domeniu corespunzator domeniului se!ectat pe care sa il
            introducem in tabelul produse */

            <?php
            $sql = "select * from domenii order by domeniu";
            $resursa = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($resursa)) {
                print '<option value="' . $row['id_domeniu'] . '">' . $row['domeniu'] . '</option>';
            }
            ?>

        </select>

        <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="modifica_domeniu" value="Modifica">
        <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="sterge_domeniu" value="Șterge">
    </form>
</div>

<div style="width:600px; border:3px solid #632415; 
   background-color:#F9F1E7; padding:5px">

    <b>Selectează producătorul pe care dorești să-l modifici sau să-l ștergi:</b>
    <hr>
    <form action="formulare_modificare_stergere.php" method="POST">
        <label for="producator">Producător:</label>
        <select name="id_producator" id="producator">

            /*afisam si lista drop-down cu autori*/

            <?php
            $sql = "select * from producatori order by producator";
            $resursa = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($resursa)) {
                print '<option value="' . $row['id_producator'] . '">' . $row['producator'] . '</option>';
            }
            ?>
        </select>

        <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="modifica_producator" value="Modifică">
        <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="sterge_producator" value="Șterge">

    </form>
</div>

<div style="width:600px; border:3px solid #632415; 
   background-color:#F9F1E7; padding:5px">

    <b>Selectează producătorul și scrie oferta produsului pe care dorești sa îl modifici sau îl ștergi:</b>
    <hr>
    <form action="formulare_modificare_stergere.php" method="POST">
        <table>
            <tr>
                <td><label for="id_producator">Producător:</label></td>
                <td>
                    <select id="id_producator" name="id_producator">

                        <?php

                        /*afisam si lista drop-down cu autori*/

                        $sql = "select * from producatori order by producator";
                        $resursa = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($resursa)) {
                            print '<option value="' . $row['id_producator'] . '" name="'.$row['id_producator'].'">' . $row['producator'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="oferta_produs">Oferta produs</label></td>
                <td><INPUT type="text" id="oferta_produs" name="oferta_produs"></td>
            </tr>
        </table>
        <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="modifica_produs" value="Modifica">
        <INPUT type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #D1F2EB; border: 3pt ridge lightgrey" name="sterge_produs" value="Șterge">
    </form>
</div>
</body>
</html>
