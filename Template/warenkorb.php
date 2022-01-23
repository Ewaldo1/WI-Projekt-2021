<?php include "HeaderHEKAY.php";
      include "connectDB.php";
      include "Datenbank/dbOperationen.php";


session_start();
if(isset($_SESSION["username"])){
    $nutzername = $_SESSION["username"];
} else {
    $nutzername = 0;
}
<<<<<<< HEAD
//HIER KOMMENTIEREN WAS DIE METHODEN MACHEN
    $dbOperation = new dbOperationen();
=======

$dbOperation = new dbOperationen();
if($nutzername === 0){
    $anzahlWarenkorbinhalte = 0;
    $warenkorbInhalte = 0;
    $summeWarenkorbinhalte = 0;
} else {
>>>>>>> 4e5998cd7f30784dc2da9a88b495dc96c7b0edad
    $nutzerId = $dbOperation->getUserID($con, $nutzername);
    $anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con);
    $warenkorbInhalte = $dbOperation->getCartItemsForUserId($nutzerId, $con); //Alle inhalte die die warenkorb sind
    $summeWarenkorbinhalte = $dbOperation->getCartSumForUserId($nutzerId, $con);
}

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
        if($warenkorbInhalte > 0):?>
        <?php foreach ($warenkorbInhalte as $warenkorbInhalt):?>
        <!-- row -->
        <div class="row warenkorbItem">
            <?php include 'warenkorbItems.php'; ?>
        </div>
        <?php endforeach;?>
        <?php endif;?>
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
            <?php if ($warenkorbInhalte != 0):?><a href="checkout.php" class="btn btn-primary col-12 text-center"> Zur Kasse gehen</a><?php endif; ?>
            <?php if ($warenkorbInhalte != 0):?><a href="checkout.php" class="btn btn-danger col-12 text-center"> Produkt loschen</a><?php endif; ?>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<?php include "FooterHEKAY.php"; ?>

</body>
</html>
