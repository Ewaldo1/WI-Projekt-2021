<?php include "HeaderHEKAY.php";
include "connectDB.php";
include "Datenbank/dbOperationen.php";

session_start();

$dbOperation = new dbOperationen();
$nutzername = $_SESSION["username"];
$nutzerId = $dbOperation->getUserID($con, $nutzername);

$warenkorbInhalte = $dbOperation->getCartItemsForUserId($nutzerId, $con);

if (empty($warenkorbInhalte)){

    header("Location: warenkorb.php");
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Bestellvorgang</a></li>
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
                <h3 class="breadcrumb-header">Überprüfen & Bestellen</h3>
                <!--ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li-->
                </ul>
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
        <form action = "checkout.php" method = "post" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Rechnungsanschrift</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="first-name" placeholder="Vorname" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="last-name" placeholder="Nachname" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="address" placeholder="Straße" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="city" placeholder="PLZ" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="country" placeholder="Land" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="tel" placeholder="Telefonnummer" required>
                    </div>
                </div>
                <!-- /Billing Details -->
                <!-- Shiping Details -->
                <div class="shiping-details">
                    <form action = "checkout.php" method = "post" class="needs-validation" novalidate>
                    <div class="section-title">
                        <h3 class="title">Lieferadresse</h3>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="shiping-address">
                        <label for="shiping-address">
                            <span></span>
                            zu einer anderen Adresse liefern?
                        </label>
                        <div class="caption">
                            <div class="form-group">
                                <input class="input" type="text" name="first-name" placeholder="Vorname" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="last-name" placeholder="Nachname" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Straße" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="PLZ" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Land" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Telefonnummer" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Shiping Details -->

                <!-- Order notes -->
                <div class="order-notes">
                    <textarea class="input" placeholder="Notizen"></textarea>
                </div>
                <!-- /Order notes -->
            </div>
            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <form action = "checkout.php" method = "post" class="needs-validation" novalidate>
                <div class="section-title text-center">
                    <h3 class="title">Ihre gewünschte Bezahlmethode</h3>

                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Vorkasse
                            </label>
                            <div class="caption">
                                <p>Sie erhalten zu Ihrer jeweiligen Bestellung rechtzeitig die Überweisungsdaten.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                PayPal
                            </label>
                            <div class="caption">
                                <p>Sie können Ihre PayPal-Daten im Anschluss an eine Bestellung eingeben oder ändern.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                VISA Kreditkarte
                            </label>
                            <div class="caption">
                                <p>Sie können Ihre Kreditkarten-Daten im Anschluss an eine Bestellung eingeben und ändern.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-4" required>
                            <label for="payment-4">
                                <span></span>
                                Rechnung
                            </label>
                            <div class="caption">
                                <p>Die Rechnung geht Ihnen nach Auslieferung der Ware per E-Mail als PDF-Datei zu. Darin finden Sie alle Informationen, die Sie benötigen, um die Rechnung zu begleichen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">
                            <span></span>
                            Hiermit erkläre ich mich mit den AGB und der Datenschutzerklärung sowie mit der Widerrufsbelehrung einverstanden.</a>
                        </label>
                    </div>
                    <!--<a href="bezahlt.php" class="primary-btn order-submit">Kaufen</a>-->
                    <button class="btn btn-danger btn-lg btn-block"  name ="bezahlen">Bezahlen</button>
                </div>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php
    if(isset($_POST['bezahlen'])){
    $vorname = $_POST["first-name"];
    $nachname = $_POST["last-name"];
    $email = $_POST["email"];
    $adresse = $_POST["address"];
    $plz = $_POST["city"];
    $land = $_POST["country"];
    $telnummer = $_POST["tel"];
    header("Location: bezahlt.php");
}
?>

<!--Quelle: https://www.w3schools.com/bootstrap4/bootstrap_forms.asp-->
<script>
    //es wird geprüft, ob es unausgefüllte Felder gibt, wenn ja wird die Meldung für invalid-feedback ausgegeben
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


<?php include "FooterHEKAY.php"; ?>
</body>
</html>