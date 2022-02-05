<?php include "headerStartSeite.php"; ?>
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
                <li class="active"><a href="#">Login</a></li>
                <li><a href="index.php">Startseite</a></li>
                <li><a href="regist.php">Noch keinen Account? - Hier Registrieren!</a></li>
                <li><a href="help.php">Probleme beim Anmelden?</a></li>
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
                <h3 class="breadcrumb-header">Bereits Kunde?</h3>
                <p> Melden Sie sich an und genießen sie die große Auswahl an Elektroartikel in bester Qualität! </p>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<section class="container">
    <form action = "login.php" method = "post" class="needs-validation" novalidate> <!-- Eingaben werden auf Vollständigkeit geprüft, wenn Feld unausgefüllt, dann Fehler -->
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name= "username" required><br>
                    <label>Passwort</label>
                    <input type="password" class="form-control" placeholder="Passwort" name = "passwort" required>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type ="submit" name ="submit">Login</button>
                <br> <br>


            </div>


        </div>
</section>
</form>
<section class="container">
    <a href="regist.php" class="btn btn-primary col-12 text-center">Account erstellen!</a>
    <br>
    <br>
    <a href="passwortVergessen.php">haben sie Ihre password vergessen?</a>
</section>
<?php
session_start();

if(isset($_POST["submit"])){
    include "connectDB.php";
    $username = $_POST['username'];
    $passwort = md5($_POST['passwort']); // Eingebaute Hashfunktion mit 128 bit Hashcode
    $sql = "SELECT * FROM nutzer WHERE '" . $username . "' = Username AND '" .$passwort ."' = Passwort"; //Nutzer wird in Tabelle gesucht
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) { //prüfen ob Nutzer gefunden
        session_start();
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["username"] = $username;
            $_SESSION["passwort"] = $passwort;
        }
        //Hier werde überprüfen ob wir Online sind!
        include BackEnd/online.php;
        header("Location: index.php");
    } else { ?>
        <br><div class="alert alert-danger"> <strong><?php echo "Benutzername oder Passwort falsch"?></strong></div> <?php
    }
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
<html>
<br> <br>
</html>
<?php include "FooterHEKAY.php"; ?>
</body>
</html>

