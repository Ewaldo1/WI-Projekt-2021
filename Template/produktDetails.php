<?php include "HeaderHEKAY.php"; ?>


<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Info zum Produkt</a></li>
                <li><a href="index2.php"><span>Startseite</span></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container" id="produktDetails">
        <div class="card">
            <div class="card-header">
                <h2><?php echo "Test" //$produkt['Titel'] //Titel der Zeile aus der Produktdatenbanktabelle ?></h2>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="./img/product01.png" class="card-img-top" height="300px" width="300px" alt="produkt">
                        </div>
                        <div class="col-8">
                            <div>Preis: <b><?php echo 5//$produkt['Preis'] .'€'?></b></div>
                            <hr/>
                            <div><?php echo "Test"//$produkt['Beschreibung'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="index2.php/warenkorb/add/<?= 1 //$produkt['ID']?>" class="btn btn-success btn-sm">Zum Warenkorb</a>
                </div>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php include "FooterHEKAY.php"; ?>
</body>
</html>
