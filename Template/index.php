<?php
include "Datenbank/dbOperationen.php";
include "connectDB.php";
session_start();

if (empty($_SESSION["username"])) {
    include "headerStartSeite.php";

} else{
    include "HeaderHEKAY.php";
}

if(isset($_SESSION["username"])){
    $nutzername = $_SESSION["username"];
} else {
    $nutzername = "";
}

$dbOperation = new dbOperationen();

$nutzerId = $dbOperation->getUserID($con, $nutzername);
$randProdukte = $dbOperation->randProducts($con); //hier gibt Zufällig die Produkten in der Index
$produkte = $dbOperation->getProducts($con);  //Hier Seile von eine Produkt
$anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con); //

if($nutzername === 0){
    $anzahlWarenkorbinhalte = 0;
} else {
    $nutzerId = $dbOperation->getUserID($con, $nutzername);
    $anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con);
}

$randProdukte = $dbOperation->randProducts($con);
$produkte = $dbOperation->getProducts($con);

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

                <li><a href="warenkorb.php"><i class="fa fa-shopping-cart"></i>
                        <span>Warenkorb(<?= $anzahlWarenkorbinhalte  ?>)</span><li>
                    <li><a href="produktHinzu.php">Produkt hinzufügen</a></li>

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<?php  //Definiere eindeutige Routen

$url = $_SERVER['REQUEST_URI'];
$indexPHPPosition = strpos($url, 'index.php');
$route = substr($url, $indexPHPPosition);
$route = str_replace('index.php', '', $route);


//Sachen in Warekorb Addieren
if(strpos($route,'/warenkorb/add/') !== false) { //strpos schaut in der route nach, ob es den String /warenkorb/add gibt
    $routeParts = explode("/", $route); //ProduktID befindet sich an der dritten Stelle, somit:
    $produktId = (int) $routeParts[3]; //Stelle aus der URL auslesen und der Variablen produktID übergeben
    if($nutzerId === 0){
        header("Location: /template/login.php");
    } else {
        $zuWarenkorbHinzu = $dbOperation->productToCart($nutzerId, $produktId, $con);
        header("Location: /template/index.php");
        exit();
    }
}
?>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php if(isset($_SESSION["username"])):?>
                <h2>Willkommen<?php echo " ".$nutzername; ?></h2>
            <?php endif ?>
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Kategorien</h3>
                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <!-- shop -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="shop">
                                        <div class="shop-img">
                                            <img src="./img/shop06.png" alt="">
                                        </div>
                                        <div class="shop-body">
                                            <h3>Notebook</h3>
                                            <a href="kategorie.php?kategorie=Notebook" class="cta-btn">Jetzt einkaufen <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                   </div>
                                </div>
                                <!-- /shop -->

                                <!-- shop -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="shop">
                                        <div class="shop-img">
                                            <img src="./img/shop04.png" alt="">
                                        </div>
                                        <div class="shop-body">
                                            <h3>Smartphone</h3>
                                            <a href="kategorie.php?kategorie=Smartphone" class="cta-btn">Jetzt einkaufen <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /shop -->

                                <!-- shop -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="shop">
                                        <div class="shop-img">
                                            <img src="./img/shop05.png" alt="">
                                        </div>
                                        <div class="shop-body">
                                            <h3>Fernseher</h3>
                                            <a href="kategorie.php?kategorie=Fernseher" class="cta-btn">Jetzt einkaufen <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /shop -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /SECTION -->

                    <!-- SECTION -->
                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">

                                <!-- section title -->
                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h3 class="title">Unsere Tageshighlights</h3>
                                    </div>
                                </div>
                                <!-- /section title -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<section class="container" id="product">
    <div class="row"> <?php //eine Zeile für die Cards?>

        <?php
        //alles was in tabelle steht so lange lesen
        foreach ($randProdukte as $product): //foreach wird hier mit ":" unterbrochen?>
            <div class="col"> <?php //jeweils eine Spalte pro Card?>
                <?php include 'cardHighlight.php' //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt?>
            </div>
        <?php endforeach; //hier wird die foreach dann abgeschlossen?>
    </div>

</section>

 <!-- SECTION -->
     <div class="section">
         <!-- container -->
          <div class="container">
            <!-- row -->
             <div class="row">
                 <!-- section title -->
                   <div class="col-md-12">
                        <div class="section-title">
                        <h3 class="title">Produktauswahl</h3>
                       </div>
                   </div>
                 <!-- /section title -->
             </div>
              <!-- /container -->
          </div>
         <!-- /SECTION -->
		</div>

          <section class="container" id="product">
             <div class="row"> <?php //eine Zeile für die Cards?>
                <?php foreach ($produkte as $product): //foreach wird hier mit ":" unterbrochen?>
                 <div class="col"> <?php //jeweils eine Spalte pro Card?>
                       <?php include 'card.php' //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt?>
                 </div>
                <?php endforeach; //hier wird die foreach dann abgeschlossen?>
             </div>
          </section>

                    <!-- BREADCRUMB -->
                    <div id="breadcrumb" class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hot-deal">
                                        <ul class="hot-deal-countdown">
                                            <hr>
                                            <h2 class="text-uppercase">Verlängertes Rückgaberecht</h2>
                                            <p>Nicht das Richtige bestellt? Tauschen Sie Ihre Geschenke bis zum</p>
                                            <li>
                                                <div>
                                                    <h3>31</h3>
                                                    <span>Tag</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h3>01</h3>
                                                    <span>Monat</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h3>2022</h3>
                                                    <span>Jahr</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <a class="primary-btn cta-btn" href="#">Mehr erfahren</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /BREADCRUMB -->

        <?php include 'FooterHEKAY.php'; ?>
    </body>
</html>
