<?php
session_start();

if (empty($_SESSION["username"])) {
    include "headerStartSeite.php";

} else{
    include "HeaderHEKAY.php";
}


include "Datenbank/dbOperationen.php";
include "connectDB.php";



if(isset($_SESSION["username"])){
    $nutzername = $_SESSION["username"];
}

$dbOperation = new dbOperationen();
$nutzerId = 3;
//$nutzerId = "SELECT ID FROM nutzer WHERE Username = '$nutzername'";
$result = mysqli_query($con, $nutzerId);

/*if(isset($_SESSION["nutzerId"])){
    $nutzerId = $_SESSION["nutzerId"];
}*/
$produkte = $dbOperation->getProducts($con);
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
                <li class="active"><a href="#">Home</a></li>

                <li><a href="warenkorb.php"><i class="fa fa-shopping-cart"></i>
                        <span>Warenkorb(<?= $anzahlWarenkorbinhalte ?>)</span><li>
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

if(strpos($route,'/warenkorb/add/') !== false) {
    $routeParts = explode("/", $route); //ProduktID befindet sich an der dritten Stelle, somit:
    $produktId = (int) $routeParts[3]; //Stelle aus der URL auslesen und der Variablen produktID übergeben
    $zuWarenkorbHinzu = $dbOperation->productToCart($nutzerId, $produktId, $con);
    header("Location: /template/index.php");
    exit();
}


if(strpos($route, '/produkt') !== false){
    $routeParts = explode("/", $route);
  /*  if(count($routeParts) !== 3){
        echo "Ungültige URL";
        exit();
    }*/
    $slug = $routeParts[2];
    if(strlen($slug) === 0){
        echo "Ungültiges Produkt";
        exit();
    }
    $produkt = $dbOperation->getProductBySlug($slug, $con);
    if($produkt === null){
        echo "Ungültiges Produkt2";
        exit();
    }
    include 'produktDetails.php';
}

if (strpos($route, '/kategorie') !== false) {
    $routeParts = explode("/", $route); //ProduktID befindet sich an der dritten Stelle, somit:
    $kategorieId = $routeParts[2]; //Stelle aus der URL auslesen und der Variablen produktID übergeben
    $produkte = $dbOperation->getProductByCategory($con, $kategorieId);

    include "kategorie.php";
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
                                            <a href="index.php/kategorie/Notebook" class="cta-btn">Jetzt einkaufen <i class="fa fa-arrow-circle-right"></i></a>
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
                                            <a href="index.php/kategorie/Smartphone" class="cta-btn">Jetzt einkaufen <i class="fa fa-arrow-circle-right"></i></a>
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
                                            <a href="index.php/kategorie/Fernseher" class="cta-btn" name="fernseher">Jetzt einkaufen <i class="fa fa-arrow-circle-right"></i></a>
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
                                        <h3 class="title">Produkte</h3>
                                        <div class="section-nav">
                                            <ul class="section-tab-nav tab-nav">
                                                <li class="active"><a data-toggle="tab" href="#tab1">Laptop</a></li>
                                                <li><a data-toggle="tab" href="#tab1">Smartphone</a></li>
                                                <li><a data-toggle="tab" href="#tab1">Fernseher</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /section title -->
									</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
                                <section class="container" id="products">
                                    <div class="row"> <?php //eine Zeile für die Cards?>
                                        <?php foreach ($produkte as $produkt): //while wird hier mit ":" unterbrochen?>
                                            <div class="col"> <?php //jeweils eine Spalte pro Card?>
                                                <?php include 'card.php' //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt?>
                                            </div>
                                        <?php endforeach; //hier wird die while dann abgeschlossen?>
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
                                        <div class="section-nav">
                                            <ul class="section-tab-nav tab-nav">
                                                <!--li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li-->
                                                <!--li><a data-toggle="tab" href="#tab2">Smartphones</a></li-->
                                                <!--li><a data-toggle="tab" href="#tab2">Fernseher</a></li-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /section title -->

                                <!-- Products tab & slick -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="products-tabs">
                                            <!-- tab -->
                                            <div id="tab2" class="tab-pane fade in active">
                                                <div class="products-slick" data-nav="#slick-nav-2">
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/product06.png" alt="">
                                                            <div class="product-label">
                                                                <span class="sale">-30%</span>
                                                                <span class="new">Neu</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Laptop</p>
                                                            <h3 class="product-name"><a href="#">LaptopXM</a></h3>
                                                            <h4 class="product-price">€750 <del class="product-old-price">€900</del></h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">zur Wunschliste hinzufügen</span></button>
                                                                <!--button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button-->
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> In den Warenkorb</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->

                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/product07.png" alt="">
                                                            <div class="product-label">
                                                                <span class="sale">-50%</span>
                                                                <span class="new">Neu</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Smartphone</p>
                                                            <h3 class="product-name"><a href="#">SmartphoneA</a></h3>
                                                            <h4 class="product-price">€250 <del class="product-old-price">€500</del></h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">zur Wunschliste hinzufügen</span></button>
                                                                <!--button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button-->
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> In den Warenkorb</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->

                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/product08.png" alt="">
                                                            <div class="product-label">
                                                                <span class="sale">-25%</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Laptop</p>
                                                            <h3 class="product-name"><a href="#">LaptopXN</a></h3>
                                                            <h4 class="product-price">€600 <del class="product-old-price">€700</del></h4>
                                                            <div class="product-rating">
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">zur Wunschliste hinzufügen</span></button>
                                                                <!--button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button-->
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> In den Warenkorb</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->

                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/product10.png" alt="">
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Laptop</p>
                                                            <h3 class="product-name"><a href="#">LaptopXP</a></h3>
                                                            <h4 class="product-price">€1200 <del class="product-old-price">€1300</del></h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">zur Wunschliste hinzufügen</span></button>
                                                                <!--button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button-->
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> In den Warenkorb</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->

                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/product11.png" alt="">
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Fernseher</p>
                                                            <h3 class="product-name"><a href="#">FernseherTX</a></h3>
                                                            <h4 class="product-price">€800 <del class="product-old-price">€1000</del></h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">zur Wunschliste hinzufügen</span></button>
                                                                <!--button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button-->
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> In den Warenkorb</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->
                                                </div>
                                                <div id="slick-nav-2" class="products-slick-nav"></div>
                                            </div>
                                            <!-- /tab -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /Products tab & slick -->
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
                                <div class="col-md-4 col-xs-6">
                                    <div class="section-title">
                                        <h4 class="title">Unsere Topseller</h4>
                                        <div class="section-nav">
                                            <div id="slick-nav-3" class="products-slick-nav"></div>
                                        </div>
                                    </div>

                                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                                        <div>
                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/laptop01.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Laptop</p>
                                                    <h3 class="product-name"><a href="#">AcerSwift</a></h3>
                                                    <h4 class="product-price">€1200 <del class="product-old-price">€1500</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/laptop02.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Laptop</p>
                                                    <h3 class="product-name"><a href="#">Microsoft Surface</a></h3>
                                                    <h4 class="product-price">€1400 <del class="product-old-price">€1600</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/laptop03.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Laptop</p>
                                                    <h3 class="product-name"><a href="#">Dell XPS 13</a></h3>
                                                    <h4 class="product-price">€1500 <del class="product-old-price">€2000</del></h4>
                                                </div>
                                            </div>
                                            <!-- product widget -->
                                        </div>

                                        <div>
                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/laptop04.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Laptop</p>
                                                    <h3 class="product-name"><a href="#">Asus Zenbook</a></h3>
                                                    <h4 class="product-price">€600 <del class="product-old-price">€800</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/laptop05.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Laptop</p>
                                                    <h3 class="product-name"><a href="#">MSI Modern 14</a></h3>
                                                    <h4 class="product-price">€1200 <del class="product-old-price">€1500</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/laptop06.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Laptop</p>
                                                    <h3 class="product-name"><a href="#">Apple MacBook Air 13</a></h3>
                                                    <h4 class="product-price">€900 <del class="product-old-price">€1000</del></h4>
                                                </div>
                                            </div>
                                            <!-- product widget -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xs-6">
                                    <div class="section-title">
                                        <h4 class="title">Unsere Topseller</h4>
                                        <div class="section-nav">
                                            <div id="slick-nav-4" class="products-slick-nav"></div>
                                        </div>
                                    </div>

                                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                                        <div>
                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/smartphone01.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Smartphone</p>
                                                    <h3 class="product-name"><a href="#">SamsungGalaxyS21</a></h3>
                                                    <h4 class="product-price">€700 <del class="product-old-price">€900</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/smartphone02.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Smartphone</p>
                                                    <h3 class="product-name"><a href="#">LG</a></h3>
                                                    <h4 class="product-price">€500 <del class="product-old-price">€600</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/smartphone03.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Smartphone</p>
                                                    <h3 class="product-name"><a href="#">Xiaomi Redmi Note 8 </a></h3>
                                                    <h4 class="product-price">€150 <del class="product-old-price">€200</del></h4>
                                                </div>
                                            </div>
                                            <!-- product widget -->
                                        </div>

                                        <div>
                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/smartphone04.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Smartphone</p>
                                                    <h3 class="product-name"><a href="#">Huawei P30 Lite</a></h3>
                                                    <h4 class="product-price">€200 <del class="product-old-price">€600</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/smartphone05.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Smartphone</p>
                                                    <h3 class="product-name"><a href="#">APPLE iPhone 13</a></h3>
                                                    <h4 class="product-price">€850 <del class="product-old-price">€1100</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/smartphone06.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Smartphone</p>
                                                    <h3 class="product-name"><a href="#">APPLE iPhone 13</a></h3>
                                                    <h4 class="product-price">€850 <del class="product-old-price">€1100</del></h4>
                                                </div>
                                            </div>
                                            <!-- product widget -->
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix visible-sm visible-xs"></div>

                                <div class="col-md-4 col-xs-6">
                                    <div class="section-title">
                                        <h4 class="title">Unsere Topseller</h4>
                                        <div class="section-nav">
                                            <div id="slick-nav-5" class="products-slick-nav"></div>
                                        </div>
                                    </div>

                                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                                        <div>
                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/fernseher01.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Fernseher</p>
                                                    <h3 class="product-name"><a href="#">SONY XR-75X92J LED TV</a></h3>
                                                    <h4 class="product-price">€1800 <del class="product-old-price">€2200</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/fernseher02.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Fernseher</p>
                                                    <h3 class="product-name"><a href="#">SAMSUNG GQ43Q60A QLED TV</a></h3>
                                                    <h4 class="product-price">€400 <del class="product-old-price">€700</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/fernseher03.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Fernseher</p>
                                                    <h3 class="product-name"><a href="#">PHILIPS 32 PHS 5525/12 LED TV </a></h3>
                                                    <h4 class="product-price">€100 <del class="product-old-price">€200</del></h4>
                                                </div>
                                            </div>
                                            <!-- product widget -->
                                        </div>

                                        <div>
                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/fernseher04.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Fernseher</p>
                                                    <h3 class="product-name"><a href="#">SAMSUNG GQ65Q60A QLED TV </a></h3>
                                                    <h4 class="product-price">€1300 <del class="product-old-price">€1500</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/fernseher05.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Fernseher</p>
                                                    <h3 class="product-name"><a href="#">GRUNDIG 50 GUB 7022 FIRE TV EDITION LED TV</a></h3>
                                                    <h4 class="product-price">€500 <del class="product-old-price">€350</del></h4>
                                                </div>
                                            </div>
                                            <!-- /product widget -->

                                            <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="./img/fernseher06.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Fernseher</p>
                                                    <h3 class="product-name"><a href="#">LG OLED48A19LA OLED TV </a></h3>
                                                    <h4 class="product-price">€900 <del class="product-old-price">€1500</del></h4>
                                                </div>
                                            </div>
                                            <!-- product widget -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /SECTION -->
                    <?php


                    include "FooterHEKAY.php";


                    ?>


                    </body>
                    </html>
