<?php
include "HeaderHEKAY.php";
include "connectDB.php";
include "Datenbank/dbOperationen.php";

if(isset($_GET['produktSuchen'])) { // wenn der Button für die Suche gedrückt wird,
    $suche = $_GET['search']; // wird der eingegebene String als Suchbegriff in der Variable $suche gespeichert
                              // wird kein Suchbegriff eingegeben werden all unsere Produkte selektiert
}


$dbOperation = new dbOperationen();
$suchergebnis = $dbOperation->getProductBySearch($con, $suche); // der Suchbegriff wird der Funktion übergeben und mit einem passenden Titel unserer Produkte verglichen
?>

    <section class="container" id="product">
        <div class="row"> <?php //eine Zeile für die Cards?>
            <?php if($suchergebnis != NULL): // wenn ein Suchbegriff gefunden wurde, dann gib den/die Produkte als Cards aus ?>
                <?php foreach ($suchergebnis as $product): //foreach wird hier mit ":" unterbrochen?>
                    <div class="col"> <?php //jeweils eine Spalte pro Card?>
                        <?php include 'card.php' //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt?>
                    </div>
                <?php endforeach; //hier wird die foreach dann abgeschlossen?>
        </div>
            <?php endif; ?>
    </section>

<?php include "FooterHEKAY.php";

