<?php
include "HeaderHEKAY.php";
include "Datenbank/dbOperationen.php";
include "connectDB.php";
session_start();
if(isset($_SESSION["username"])){
    $nutzername = $_SESSION["username"];
} else {
    $nutzername = 0;
    header("Location: login.php");
}

$dbOperation = new dbOperationen();
$nutzerId = $dbOperation->getUserID($con, $nutzername);
$anzahlWarenkorbinhalte = $dbOperation->countProductsInCart($nutzerId, $con);
$errors = [];
$countErrors = 0;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

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
    <form action = "produktHinzu.php" method = "post" class="needs-validation" novalidate>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Produktname:</label>
                    <input type="text" class="form-control" id="titel"  placeholder="Vergeben Sie einen Titel für ihr Produkt" name= "titel" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Dieses Feld muss ausgefüllt werden</div>
                </div>
                <div class="form-group">
                    <label>Slug:</label>
                    <input type="text" class="form-control" id="slug"  placeholder="Geben Sie an unter welcher URL ihr Produkt gefunden werden soll" name= "slug" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Dieses Feld muss ausgefüllt werden</div>
                </div>
                <div class="form-group">
                    <label>Kurzbeschreibung:</label>
                    <textarea class="form-control" id="kurzbeschreibung" placeholder="Vergeben Sie eine kurze Beschreibung" rows="2" name="kurzbeschreibung" required></textarea>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Dieses Feld muss ausgefüllt werden</div>
                </div>
                <div class="form-group">
                    <label>Produktbeschreibung:</label>
                    <textarea class="form-control" id="beschreibung" placeholder="Vergeben Sie eine ausführliche Beschreibung" rows="3" name="beschreibung" required></textarea>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Dieses Feld muss ausgefüllt werden</div>
                </div>
                <div class="form-group">
                    <label>Produktkategorie:</label><br>
                    <input type="radio" id="notebook" name="kategorie" value="Notebook" required>
                    <label for="notebook"> Notebook</label><br>
                    <input type="radio" id="smartphone" name="kategorie" value="Smartphone">
                    <label for="smartphone"> Smartphone</label><br>
                    <input type="radio" id="fernseher" name="kategorie" value="Fernseher">
                    <label for="fernseher"> Fernseher</label>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Dieses Feld muss ausgefüllt werden</div>
                </div>
                <div class="form-group">
                    <br><label>Preis:</label>
                    <input type="text" class="form-control" id="preis"  placeholder="Geben Sie den Preis des Produktes an" name= "preis" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Dieses Feld muss ausgefüllt werden</div>
                </div>
                <div class="form-group">
                    <label>Produktbild:</label>
                    <input type="text" class="form-control" id="produktbild"  placeholder="Geben Sie den Pfad zu ihrem Bild in der Form ./img/picturename.png an" name= "produktbild" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Dieses Feld muss ausgefüllt werden</div>
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
    $bild = $_POST["produktbild"];

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
        $errors[] = "Bitte einen korrekten Preis angeben!";
    }
    if((bool)$bild === false){
        $errors[]="Produktbild muss angegeben werden!";
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
<!--Quelle: https://www.w3schools.com/bootstrap4/bootstrap_forms.asp-->
<script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<?php "FooterHekay.php" ?>

</body>
</html>