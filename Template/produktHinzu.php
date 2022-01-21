<?php
include "HeaderHEKAY.php";
include "Datenbank/dbOperationen.php";
include "connectDB.php";
session_start();
if(isset($_SESSION["username"])){
    $nutzername = $_SESSION["username"];
} else {
    $nutzername = 0;
}

$dbOperation = new dbOperationen();
$nutzerId = $dbOperation->getUserID($con, $nutzername);
$anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con);

$produktName = "";
$validationProductName = true;
$slug = "";
$validationSlug = true;
$kurzbeschreibung = "";
$beschreibung = "";
$validationBeschreibung = true;
$preis = "";
$validationPreis= true;
$bild ="";
$validationBild = true;
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
    <form action = "produktHinzu.php" method = "post">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Produktname:</label>
                    <input type="text" name= "titel" placeholder="Vergeben Sie einen Titel für ihr Produkt" class="form-control"><br>

                    <label>Slug:</label>
                    <input type="text" name= "slug" placeholder="Geben Sie an unter welcher URL ihr Produkt gefunden werden soll" class="form-control"><br>

                    <label>Kurzbeschreibung:</label>
                    <textarea class="form-control" name="kurzbeschreibung" rows="3"></textarea>

                    <label>Produktbeschreibung:</label>
                    <textarea class="form-control" name="beschreibung" rows="3"></textarea>

                    <br><label>Produktkategorie:</label><br>
                    <input type="radio" id="notebook" name="kategorie" value="Notebook" checked>
                    <label for="notebook"> Notebook</label><br>
                    <input type="radio" id="smartphone" name="kategorie" value="Smartphone">
                    <label for="smartphone"> Smartphone</label><br>
                    <input type="radio" id="fernseher" name="kategorie" value="Fernseher">
                    <label for="fernseher"> Fernseher</label><br>

                    <br><label>Preis:</label>
                    <input type="text" name= "preis" placeholder="Geben Sie den Preis des Produktes an" class="form-control"><br>

                    <label>Produktbild:</label>
                    <input type="text" name= "produktbild" placeholder="Geben Sie den Pfad zu ihrem Bild in der Form ./img/picturename.png an" class="form-control"><br>

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
    header("Location: index.php");
}
if(isset($_POST['produktHinzufügen'])){
    $produktName = $_POST["titel"];
    $slug = $_POST["slug"];
    $kurzbeschreibung = $_POST["kurzbeschreibung"];
    $beschreibung = $_POST["beschreibung"];
    $kategorie = $_POST["kategorie"];
    $preis = $_POST["preis"];
    $bild = $_POST["produktbild"]; //$_FILES["produktbild"];


  /*  function formatFiles($files){ // Der Bildfile ist ein Array aus 5 Elementen (Name, type, tmp_name, error, size), die jeweils ebenfalls ein Element als Array haben --> zu Bild nur ein einziges Array mit 5 Elementen
        $result = [];
        foreach ($files as $key => $values){
            foreach ($values as $index => $value){
                $result[$index][$key] = $value;
            }
        }

        return $result;
    }
    $bild = formatFiles($bild);
    var_dump($bild);*/

    if((bool)$produktName === false){
        $errors[]="Produktname muss angegeben werden!";
        $validationProductName = false;
    }
    if((bool)$produktName === true && (bool)$slug === false){
        $slug = str_replace(' ', '-', $produktName);
    }
    if((bool)$slug === true){
        $produkt = $dbOperation->getProductBySlug($slug, $con);
        if($produkt !== null){
            $errors[]= "Slug ist bereits vergeben!";
            $validationSlug = false;
        }
    }
    if((bool)$beschreibung === false){
        $errors[]="Produktbeschreibung muss angegeben werden!";
        $validationBeschreibung = false;
    }
    if($preis <= 0) {
        $errors[] = "Bitte einen korrekten Preis angeben!";
        $validationPreis = false;
    }
    if((bool)$bild === false){
        $errors[]="Bitte ein Bild hinzufügen!";
        $validationBild = false;
    }

    $countErrors = count($errors);
    if($countErrors == 0){
        $dbOperation->addProduct($con,$produktName, $slug, $kurzbeschreibung, $beschreibung, $kategorie, $preis, $bild);
    } else{ ?>
        <ul class="alert alert-danger">
        <?php foreach ($errors as $errorMessage):?>
                <li><?php echo "- $errorMessage" ?></li>
            <?php endforeach ?>
         </ul><?php
    }
    exit();
}
?>

<?php "FooterHekay.php" ?>

</body>
</html>
