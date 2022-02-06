
<?php
require 'connectDB.php';
session_start();
$_userEmail = $_POST["email"];
$_userPassword = $_POST["passwort"];
$_userOld = $_POST["geburtsdatum"];
$_userName = $_POST["userName"];

//Die Tabelle BENUTZER Enthählt info von unsere Users!
if(isset($_POST['submit'])) {
    $prüfung1 = verificationData($_userEmail, $_userOld); //HIER WIRD ÜBERPRÜFT ob gab RICHTIGE ABGABE bei EMAIL UND ALTER
    if($prüfung1 === false) { ?>
        <br><div class="alert alert-danger"> <strong><?php echo "Fehler bei der Registrierung"?></strong></div> <?php
    } else {
        // Hier wird gesucht ob der email schon existiert!

        $sql = "SELECT Email FROM nutzer WHERE '" . $_userEmail . "' = Email";
        $searchResult = mysqli_query($con,$sql);
        if(mysqli_num_rows($searchResult) > 0) { ?>
             <br><div class="alert alert-danger"> <strong><?php echo "Benutzer existiert bereits. Bitte logge dich ein."?></strong></div> <?php
        } else {
            //Hier wird in Data eingefügt die gebenende Daten
            $_userEmail = md5($_POST["email"]);
            $_userPassword = md5($_POST["passwort"]);
            $insert = "INSERT INTO nutzer(Email, Passwort, Geburtsdatum, Username)VALUES ('$_userEmail', '$_userPassword', '$_userOld', '$_userName')";
            $result = mysqli_query($con, $insert);
            if ($result) {
                header("Location: erfolgRegistriert.php");
            } else { ?>
                <br><div class="alert alert-danger"> <strong><?php echo "Fehler bei der Registrierung"?></strong></div> <?php
            }
        }
    }
}
?>


<?php

function verificationData($_mailP, $_oldP) {

    if(!filter_var($_oldP, FILTER_VALIDATE_INT)) { ?>
        <br><div class="alert alert-danger"> <strong><?php echo "Geben Sie bitte ein gültiges Alter ein!"?></strong></div> <?php
        return false;
    }
    if(!filter_var($_mailP, FILTER_VALIDATE_EMAIL)) { ?>
        <br><div class="alert alert-danger"> <strong><?php echo "Geben Sie eine gültige Email-Adresse an!"?></strong></div> <?php
        return false;
    }

}

function verrificationDataDB ($prüfung1) {
    if ($prüfung1 == false) {
        return 0;
    }
} ?>


