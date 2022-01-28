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
$dbOperation = new dbOperationen();
$produkte = $dbOperation->getProductByCategory($con, $_GET["kategorie"]);
$bestseller = $dbOperation->randProducts($con);
$nutzerId = $dbOperation->getUserID($con, $nutzername);
$anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con);

?>

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#"><?php echo $_GET["kategorie"] ?></a></li>

                <li><a href="warenkorb.php"><i class="fa fa-shopping-cart"></i>
                        <span>Warenkorb(<?= $anzahlWarenkorbinhalte ?>)</span><li>
                <li><a href="index.php">Startseite</a></li>

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Kategorie</h3>
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
        <?php  foreach ($produkte as $product): //while wird hier mit ":" unterbrochen?>
            <div class="col"> <?php //jeweils eine Spalte pro Card?>
                <?php include 'card.php'; //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt ?>
            </div>
        <?php endforeach; //hier wird die while dann abgeschlossen?>
    </div>
</section>

<hr style="border:solid BLACK 1px;height:0px;">

<div class="container">
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="breadcrumb-header">Bestseller des Shops:</h3>
        </div>
    </div>
</div>

<!-- /SECTION -->
<section class="container" id="notebooks">
    <div class="row"> <?php //eine Zeile für die Cards?>
        <?php  foreach ($bestseller as $product): //while wird hier mit ":" unterbrochen?>
            <div class="col"> <?php //jeweils eine Spalte pro Card?>
                <?php include 'card.php'; //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt ?>
            </div>
        <?php endforeach; //hier wird die while dann abgeschlossen?>
    </div>
</section>

<?php include 'FooterHEKAY.php'; ?>
</body>
</html>


