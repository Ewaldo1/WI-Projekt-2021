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
      $nutzerId = $dbOperation->getUserID($con, $nutzername);
      $produkt = $dbOperation->getProductBySlug($_GET["slug"], $con);
      $anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con);

?>

<style>
    .button {
        float: bottom;
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }


</style>

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Produkt hinzufügen</a></li>

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

<!-- SECTION -->
<section class="container" id="produktDetails">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $produkt['Titel'] //Titel der Zeile aus der Produktdatenbanktabelle ?></h2>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="<?php echo $produkt['Bild']; ?>" class="card-img-top" height="300px" width="300px" alt="produkt">
                        </div>
                        <div class="col-8">
                            <div>Preis:<b> <?php echo $produkt['Preis'] .'€'?></b></div>
                            <hr>
                            <div><?php echo $produkt['Beschreibung'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><br>
                    <a href="index.php/warenkorb/add/<?= $produkt['ID']?>" class="button">Zum Warenkorb</a><br>
                </div>
            <br>
        </div>
    <!-- /container -->
</section>
<!-- /SECTION -->

<?php include "FooterHEKAY.php"; ?>
</body>
</html>
