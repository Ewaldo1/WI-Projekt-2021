<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>webshop2021</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <?php include "HeaderHEKAY.php"?>

    <!-- row -->
    </div>
     <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Registrierung</a></li>
                <li class="inactive"><a href="#">Anmeldung</a></li>
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
                <h3 class="breadcrumb-header">Registrierung</h3>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- Hier soll meine Anmeldung formular kommen -->
    <!-- /container -->



</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="container">

    <h4>Geben Sie ihre Daten an</h4>
    <form method="post" action="registBackEnd.php">
        <br>

        <br>
        Deine Email-Adresse:<br>
        <input name="email" size=25><br>
        Dein Passwort:<br>
        <input name="passwort" size=25><br>
        Dein Alter<br>
        <input name="geburtsdatum" size=25><br>
        Dein Username<br>
        <input name="userName" size=25><br>
        <br>
        <br>
        <input type="submit" name = "submit" value="Anmeldung" >
        <br>
        <br>
    </form>


</div>
<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">HEKAY</h3>
                        <p>Willkommen bei HEKAY!

                            Wir haben als kleines Unternehmen in Fulda begonnen. Unser Ziel hat sich seitdem nicht geändert: Wir möchten Kunden Produkte anbieten, die sie glücklich machen – und das zu den attraktivsten Preisen.

                        </p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>36037 Fulda</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+491267890124</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>hekay@gmail.de</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Über uns</h3>
                        <ul class="footer-links">
                            <li><a href="#">Das Unternehmen</a></li>
                            <li><a href="#">Karierre</a></li>
                            <li><a href="#">Presse</a></li>
                            <li><a href="#">Verantwortung</a></li>
                            <li><a href="#">Impressum</a></li>
                            <li><a href="#">AGB</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Kundenservice</h3>
                        <ul class="footer-links">
                            <li><a href="#">Hilfe</a></li>
                            <li><a href="#">Kontakt</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Rücksendungen</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Rund um den Einkauf</h3>
                        <ul class="footer-links">
                            <li><a href="#">Benutzerdaten</a></li>
                            <li><a href="#">Fragen zur Bestellung</a></li>
                            <li><a href="#">Kaufen</a></li>
                            <li><a href="#">Bezahlen</a></li>
                            <li><a href="#">Versand und Lieferung</a></li>
                            <li><a href="#">Datenschutzerklärung</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>


                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
