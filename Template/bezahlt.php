<?php include "headerHEKAY.php";
    include "connectDB.php";
    include "Datenbank/dbOperationen.php";

    session_start();
    if(isset($_SESSION["username"])){
    $nutzername = $_SESSION["username"];
    } else {
    $nutzername = 0;
    }
    $dbOperation = new dbOperationen();
    $nutzerId = $dbOperation->getUserID($con, $nutzername);
    $anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con);
    $randProduct = $dbOperation->randProducts($con);

    if($anzahlWarenkorbinhalte > 0){ // Inhalte aus Warenkorb entfernen, da der Kauf abgeschlossen ist
        $dbOperation->deleteAllProducts($con, $nutzerId);
    }

?>
<div class="alert alert-success"> <strong><?php echo "Bezahlvorgang war erfolgreich! Sie erhalten eine Email mit der Bestellzusammenfassung." ?>
        <a href="index.php.">Hier klicken um wieder auf die Startseite zu gelangen<br></a></strong></div>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Kunden die dieses Produkt gekauft haben, haben auch gekauft:</h3>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- /SECTION -->
<section class="container" id="notebooks">
    <div class="row"> <?php //eine Zeile für die Cards?>
        <?php  foreach ($randProduct as $product): //while wird hier mit ":" unterbrochen?>
            <div class="col"> <?php //jeweils eine Spalte pro Card?>
                <?php include 'card.php'; //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt ?>
            </div>
        <?php endforeach; //hier wird die while dann abgeschlossen?>
    </div>
</section>

<?php include "FooterHEKAY.php";
