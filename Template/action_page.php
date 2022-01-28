<?php
include "HeaderHEKAY.php";
include "connectDB.php";
include "Datenbank/dbOperationen.php";
session_start();
if(isset($_SESSION["username"])){
    $nutzername = $_SESSION["username"];
} else {
    $nutzername = 0;
}
if(isset($_GET['produktSuchen'])){
    $suche = $_GET["search"];

}

$dbOperation = new dbOperationen();
$suchergebnis = $dbOperation->getProductBySearch($con, $suche);
?>

    <section class="container" id="product">
        <div class="row"> <?php //eine Zeile für die Cards?>
            <?php if($suchergebnis != NULL):?>
                <?php foreach ($suchergebnis as $product): //foreach wird hier mit ":" unterbrochen?>
                    <div class="col"> <?php //jeweils eine Spalte pro Card?>
                        <?php include 'card.php' //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt?>
                    </div>
                <?php endforeach; //hier wird die foreach dann abgeschlossen?>
        </div>
            <?php endif; ?>
    </section>
<?php include "FooterHEKAY.php";

