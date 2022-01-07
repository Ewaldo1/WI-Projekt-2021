<?php
include 'HeaderHEKAY.php';
?>

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#"><i class="fa fa-heart-o"></i>
                        <span>Wunschliste</span><li>
                    <i class="fa fa-shopping-cart"></i>
                    <span>Warenkorb</span>
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
        <?php foreach ($produkte as $produkt): //while wird hier mit ":" unterbrochen?>
            <div class="col"> <?php //jeweils eine Spalte pro Card?>
                <?php include 'card.php'; //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt ?>
            </div>
        <?php endforeach; //hier wird die while dann abgeschlossen?>
    </div>

</section>

<?php include 'FooterHEKAY.php'; ?>
</body>
</html>


