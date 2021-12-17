<?php include "HeaderHEKAY.php";
      include "connectDB.php";
      include "Datenbank/dbOperationen.php";
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
                <li><a href="index2.php"><span>Startseite</span></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<?php
/*    $sql = "SELECT Produkt_ID, Titel, Beschreibung, Preis FROM warenkorb JOIN produkte ON(warenkorb.Produkt_ID = produkte.ID) WHERE Nutzer_ID = 1";
    $result = mysqli_query($con, $sql);
    if($result === false) {
        return [];
    }
    $items = [];
    while($row = $result->fetch_assoc()){
        $items[] = $row;
    }
    return $items;
*/
?>


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
    <div class="container">
        <?php
        $userId = 1;
        $dbOperation = new dbOperationen();
        $warenkorbInhalte = $dbOperation->getCartItemsForUserId($userId, $con);
        foreach ($warenkorbInhalte as $warenkorbItems):?>
        <!-- row -->
        <div class="row">
            <?php include 'warenkorbItems.php'; ?>
        </div>
        <?php endforeach;?>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

<?php include "FooterHEKAY.php"; ?>

</body>
</html>

