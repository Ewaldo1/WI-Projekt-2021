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
                <h3 class="breadcrumb-header">Anschrift & Bezahlmethode wählen</h3>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
    <!-- container -->
    <section class="container">
        <form action = "checkout.php" method = "post" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Rechnungsanschrift</h3>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="first-name" placeholder="Vorname" required>
                            <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus!</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="last-name" placeholder="Nachname" required>
                            <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus!</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Email" required>
                            <div class="invalid-feedback">Bitte geben Sie eine korrekte E-Mail an!</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="address" placeholder="Straße" required>
                            <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus!</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="city" placeholder="PLZ" required>
                            <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus!</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="country" placeholder="Land" required>
                            <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus!</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="tel" name="tel" placeholder="Telefonnummer" required>
                            <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus!</div>
                        </div>
                    </div>
                    <!-- /Billing Details -->
                    <!-- Shiping Details -->
                    <div class="shiping-details">
                            <div class="section-title">
                                <h3 class="title">Lieferadresse</h3>
                            </div>
                                <label for="shiping-address">
                                    <h5>zu einer anderen Adresse liefern?</h5>
                                </label>
                                <div class="caption">
                                    <div class="form-group">
                                        <input class="input" type="text" name="first-name" placeholder="Vorname">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="last-name" placeholder="Nachname">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="address" placeholder="Straße">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="city" placeholder="PLZ">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="country" placeholder="Land">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="tel" name="tel" placeholder="Telefonnummer">
                                    </div>
                                </div>
                    </div>
                    <!-- /Shiping Details -->

                    <!-- Order notes -->
                    <div class="order-notes">
                        <h5>Sonstige Anmerkungen?</h5>
                        <textarea class="input" placeholder="Anmerkung"></textarea>
                    </div>
                    <!-- /Order notes -->
                </div>
                <!-- Order Details -->
                <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Ihre Bestellungen</h3>

                            <div class="payment-method">
                                <div class="row warenkorbItem">
                                    <?php include 'warenkorbItems.php'; ?>
                                </div>

                            </div>
                            <div class="section-title text-center">
                                <h3 class="title">Ihre gewünschte Bezahlmethode</h3>

                                <div class="payment-method">
                                    <div class="input-radio">
                                        <input type="radio" id="payment-1" name="payment" required>
                                        <label for="payment-1">
                                            <span></span>
                                            Vorkasse
                                        </label>
                                        <div class="caption">
                                            <p>Sie erhalten zu Ihrer jeweiligen Bestellung rechtzeitig die Überweisungsdaten.</p>
                                        </div>
                                    </div>
                                    <div class="input-radio">
                                        <input type="radio" id="payment-2" name="payment" required>
                                        <label for="payment-2">
                                            <span></span>
                                            PayPal
                                        </label>
                                        <div class="caption">
                                            <p>Sie können Ihre PayPal-Daten im Anschluss an eine Bestellung eingeben oder ändern.</p>
                                        </div>
                                    </div>
                                    <div class="input-radio">
                                        <input type="radio" id="payment-3" name="payment" required>
                                        <label for="payment-3">
                                            <span></span>
                                            VISA Kreditkarte
                                        </label>
                                        <div class="caption">
                                            <p>Sie können Ihre Kreditkarten-Daten im Anschluss an eine Bestellung eingeben und ändern.</p>
                                        </div>
                                    </div>
                                    <div class="input-radio">
                                        <input type="radio" id="payment-4" name="payment" required>
                                        <label for="payment-4">
                                            <span></span>
                                            Rechnung
                                        </label>
                                        <div class="caption">
                                            <p>Die Rechnung geht Ihnen nach Auslieferung der Ware per E-Mail als PDF-Datei zu. Darin finden Sie alle Informationen, die Sie benötigen, um die Rechnung zu begleichen.</p>
                                        </div>
                                        <div class="invalid-feedback">Bitte wählen Sie eine Zahlungsmethode aus</div>
                                    </div>
                                </div>
                            <div class="input-checkbox">
                                <input class="form-control" type="checkbox" id="terms" required>
                                <label for="terms">
                                    <span></span>
                                    Hiermit erkläre ich mich mit den AGB und der Datenschutzerklärung sowie mit der Widerrufsbelehrung einverstanden.</a>
                                </label>
                                <div class="invalid-feedback">Bitte akzeptieren Sie unsere AGB</div><br>
                            </div>
                            <button class="btn btn-danger btn-lg btn-block" type="submit" name ="bezahlen">Bezahlen</button>
                        </div>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </form>
    </section>
    <!-- /container -->

<?php
if(isset($_POST['bezahlen'])){
    header("Location: bezahlt.php");
}
?>

<!--Quelle: https://www.w3schools.com/bootstrap4/bootstrap_forms.asp-->
<script>
    //es wird geprüft, ob es unausgefüllte Felder gibt, wenn ja, wird die Meldung für invalid-feedback ausgegeben
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