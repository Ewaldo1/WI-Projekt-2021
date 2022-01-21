<?php include "HeaderHEKAY.php";
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
    $warenkorbInhalte = $dbOperation->getCartItemsForUserId($nutzerId, $con);
    $summeWarenkorbinhalte = $dbOperation->getCartSumForUserId($nutzerId, $con);
?>

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Warenkorb</a></li>
                <li><a href="index.php"><span>Startseite</span></a></li>
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
                <h3 class="breadcrumb-header">Warenkorb</h3>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container" id="warenkorbItems">
        <div class="row cartItemHeader">
            <div class="col-12 text-right">
                Preis
            </div>
            <div class="col-12 text-right">
                Menge
            </div>
        </div>
        <?php
        foreach ($warenkorbInhalte as $warenkorbInhalt):?>
        <!-- row -->
        <div class="row warenkorbItem">
            <?php include 'warenkorbItems.php'; ?>
        </div>
        <?php endforeach;?>
        <!-- /row -->
        <!--row Summe des Warenkorbs -->
        <div class="row">
            <div class="col-12 text-right">
                <hr>
                <span>Summe (<?= $anzahlWarenkorbinhalte ?> Artikel): <?= $summeWarenkorbinhalte ?>€</span><li>
            </div>
        </div>
        <!--row Bezahlbutton -->
        <div class="row">
            <a href="checkout.php" class="btn btn-primary col-12 text-center"> Zur Kasse gehen</a>
            <a href="checkout.php" class="btn btn-danger col-12 text-center"> Produkt loschen</a>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<?php include "FooterHEKAY.php"; ?>

</body>
</html>

