<?php
include "HeaderHEKAY.php";
include "connectDB.php";
include "Datenbank/dbOperationen.php";

if(isset($_GET['produktSuchen'])) { // wenn der Button für die Suche gedrückt wird,
    $suche = $_GET['search']; // wird der eingegebene String als Suchbegriff in der Variable $suche gespeichert
                              // wird kein Suchbegriff eingegeben werden all unsere Produkte selektiert
}

$dbOperation = new dbOperationen();
$suchergebnis = "";
// Wenn ein Suchbegriff eingegeben wurde, wird dieser der Funktion übergeben
// und mit einem passenden Titel unserer Produkte verglichen
if($suche === "") { ?>
    <div class="alert alert-warning"> <strong><?php echo "Keinen Suchbegriff eingegeben!" ?></strong></div> <?php
}
    else{
        $suchergebnis = $dbOperation->getProductBySearch($con, $suche);
    }
?>

    <section class="container" id="product">
        <div class="row"> <?php //eine Zeile für die Cards?>
            <?php if($suchergebnis != ""): ?>
                <?php foreach ($suchergebnis as $product): //foreach wird hier mit ":" unterbrochen?>
                    <div class="col"> <?php //jeweils eine Spalte pro Card?>
                        <?php include 'card.php' //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt?>
                    </div>
                <?php endforeach; //hier wird die foreach dann abgeschlossen?>
        </div>
            <?php endif ?>
    </section>

<?php include "FooterHEKAY.php";

