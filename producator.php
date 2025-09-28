<?php
include('conectare.php');
include('page_top.php');
include('meniu.php');
$producator = $_GET['id_producator'];
$_SESSION['producator'] = $producator;
$sql = "SELECT producator FROM producatori where producatori.id_producator=" . $producator;

$resursa = mysqli_query($conn, $sql);
$resursaProduse = mysqli_fetch_array($resursa);
print "
<td style='vertical-align: top;margin-top: 0'>
<h1 style='margin-bottom: 0; margin-top: 20px; margin-left: 20px'>Rezultatele cautarii pentru producatorul " . $resursaProduse['producator'] . "</h1>";
$_SESSION['resursa_produse'] = $resursaProduse;
?>

<table style="margin-left: 20px;">
    <tr>
        <?php
        $sql2 = "SELECT * FROM produse,producatori where producatori.id_producator=" . $producator . " and produse.id_producator=producatori.id_producator";
        $query = mysqli_query($conn, $sql2);
        $iterations = 0;
        while ($row = mysqli_fetch_array($query)) {
            $iterations++;
            print '<td style="width: 150px">';
            $adrimag = "coperte/" . $row['id_produs'] . ".jpg";

            if (file_exists($adrimag)) {
                $adrimag = "coperte/" . $row['id_produs'] . ".jpg";
                print '<img src="' . $adrimag . '" width="100" height="75"><br>';
            } else {
                print '<div style="width:75px; height:100px; border: 1px black solid;
                background-color:#cccccc;">Fara imagine</div>';
            }

            print '<b><a href="produs.php?id_produs=' . $row['id_produs'] . '">'
                . $row['producator'] . ' ' . $row['oferta_produs'] . '</a></b><br> <i><div style="margin-bottom: 30px">'
                .' <br> Preț: '
                . $row['pret'] . ' lei</div>
         </tr>';
        }
        if ($iterations == 0) {
            print"<p style='margin-left: 20px'>Nu se gaseste ceea ce cautati!.";
        }
        ?>
</table>
</td>
<?php
include('page_bottom.php');
?>