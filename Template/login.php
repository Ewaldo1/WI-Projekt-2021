<?php include "headerStartSeite.php"; ?>
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Login</a></li>
                <li><a href="vorlageIndex.php">Startseite</a></li>
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
    <form action = "login.php" method = "post">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name= "username" placeholder="Username" class="form-control"><br>
                    <label>Passwort</label>
                    <input type="password" name = "passwort" placeholder="Passwort" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type ="submit" name ="submit">Login</button>
            </div>
        </div>
</section>
</form>

<?php
session_start();

if(isset($_POST["submit"])){
    include "connectDB.php";
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];
    $sql = "SELECT * FROM nutzer WHERE '" . $username . "' = Username AND '" .$passwort ."' = Passwort"; //Nutzer wird in Tabelle gesucht
    $result = mysqli_query($con, $sql);

    if(false === (bool)$username){
        echo "Feld des Benutzers leer";

    } else if(false === (bool)$passwort){
        echo "Passwortfeld ist leer";
    } else if(mysqli_num_rows($result) > 0) { //prüfen ob Nutzer gefunden
        session_start();
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["username"] = $username;
            $_SESSION["passwort"] = $passwort;
        }
        //Hier werde überprüfen ob wir Online sind!
        include BackEnd/online.php;


        header("Location: index.php");
    } else {
        echo "Benutzername oder Passwort falsch";
    }
}
?>
<html>
<br> <br>
</html>
<?php include "FooterHEKAY.php"; ?>
</body>
</html>

