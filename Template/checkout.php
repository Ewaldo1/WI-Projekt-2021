<?php include "HeaderHEKAY.php";
include "connectDB.php";
include "Datenbank/dbOperationen.php";

session_start();

$dbOperation = new dbOperationen();
$nutzername = $_SESSION["username"];
$nutzerId = $dbOperation->getUserID($con, $nutzername);

$warenkorbInhalte = $dbOperation->getCartItemsForUserId($nutzerId, $con);

//if(empty(var_dump(count($warenkorbInhalte))))
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
        <!-- row -->
        <div class="row">
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Rechnungsanschrift</h3>
                    </div>
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
                    <div class="form-group">
                        <div class="input-checkbox">
                            <input type="checkbox" id="create-account">
                            <label for="create-account">
                                <span></span>
                                Konto erstellen?
                            </label>
                            <div class="caption">
                                <p>Erstellen Sie ein sicheres Passwort für Ihr neues Konto.</p>
                                <input class="input" type="password" name="password" placeholder="Passwort eingeben">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Billing Details -->
                <!-- Shiping Details -->
                <div class="shiping-details">
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
                        <input type="radio" name="payment" id="payment-4">
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
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        Hiermit erkläre ich mich mit den AGB und der Datenschutzerklärung sowie mit der Widerrufsbelehrung einverstanden.</a>
                    </label>
                </div>
                <a href="bezahlt.php" class="primary-btn order-submit">Kaufen</a>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<?php include "FooterHEKAY.php"; ?>
</body>
</html>