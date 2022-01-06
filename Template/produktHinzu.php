<?php
include "HeaderHEKAY.php";
include "Datenbank/dbOperationen.php";
include "connectDB.php";

$dbOperation = new dbOperationen();
$nutzerId = 1;
$anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con);

$produktName = "";
$slug = "";
$beschreibung = "";
$preis = "";
$errors = [];
$countErrors = 0;
?>

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Produkt hinzufügen</a></li>
                <li><a href="index2.php"> Startseite</a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i>
                        <span>Warenkorb(<?= $anzahlWarenkorbinhalte ?>)</span><li>
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
                <h3 class="breadcrumb-header">Fügen Sie ein Produkt Ihrer Wahl hinzu</h3>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- /BREADCRUMB -->
<section class="container">
    <form action = "login.php" method = "post">
        <div class="card">
            <div class="card-body">

                <?php if($countErrors > 0):?>
                <div class="alert-danger" role="alert">
                    <?php foreach ($errors as $errorMessage):?>
                        <p><?= $errorMessage?></p>;
                    <?php endforeach;?>
                </div>
                <?php endif;?>

                <div class="form-group">
                    <label>Produktname</label>
                    <input type="text" name= "titel" placeholder="Vergeben Sie einen Titel für ihr Produkt" class="form-control"><br>
                    <label>Slug</label>
                    <input type="text" name= "slug" placeholder="Geben Sie an unter welcher URL ihr Produkt gefunden werden soll" class="form-control"><br>
                    <label>Produktbeschreibung</label>
                    <textarea class="form-control" name="beschreibung" rows="3"></textarea>
                    <label>Preis</label>
                    <input type="text" name= "preis" placeholder="Geben Sie den Preis des Produktes an" class="form-control"><br>

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-danger"   name ="abbrechen">Abbrechen</button>
                <button class="btn btn-success"  name ="produktHinzufügen">Speichern</button>
            </div>
        </div>
</section>
</form>

<?php
if(isset($_POST['abbrechen'])){
    header("Location: index2.php");
}
if(isset($_POST['produktHinzufügen'])){
    $produktName = $_POST["titel"];
    $slug = $_POST["slug"];
    $beschreibung = $_POST["beschreibung"];
    $preis = $_POST["preis"];

    if((bool)$produktName === false){
        $errors[]="Produktname muss angegeben werden!";
    }
    if((bool)$produktName === true && (bool)$slug === false){
        $slug = str_replace(' ', '-', $produktName);
    }
    if((bool)$slug === true){
        $produkt = $dbOperation->getProductBySlug($slug, $con);
        if($produkt !== null){
            $errors[]= "Slug ist bereits vergeben!";
        }
    }
    if((bool)$beschreibung === false){
        $errors[]="Produktbeschreibung muss angegeben werden!";
    }
    if($preis <= 0) {
        $errors[] = "Bitte einen korrekt Preis angeben!";
    }
    $countErrors = count($errors);
    if($countErrors == 0){
        $dbOperation->addProduct($con,$produktName, $slug, $beschreibung, $preis);
    }
}
?>

<?php "FooterHekay.php" ?>

</body>
</html>
