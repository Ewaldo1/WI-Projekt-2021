
<body>
<?php include ("header.php"); ?>
<h4>Geben Sie ihre Daten an</h4>
<form method="post" action="regist.php">



    <br>

    <br>
    Deine Email-Adresse:<br>
    <input name="email" size=16><br>
    Dein Passwort:<br>
    <input name="passwort" size=10><br>
    Dein Alter<br>
    <input name="geburtsdatum" size=5><br>
    Dein Username<br>
    <input name="userName" size=10><br>
    <br>
    <input type="submit" name = "submit" value="Anmeldung" >

</form>





<?php

    require 'connectDB.php';

    $_userEmail = $_POST["email"];
    $_userPassword = $_POST["passwort"];
    $_userOld = $_POST["geburtsdatum"];
    $_userName = $_POST["userName"];

    //Die Tabelle BENUTZER Enthählt info von unsere Users!
    if(isset($_POST['submit'])) {
        $prüfung1 = verificationData($_userEmail, $_userOld); //HIER WIRD ÜBERPRÜFT ob gab RICHTIGE ABGABE bei EMAIL UND ALTER
        if($prüfung1 === false) {
            echo "Fehler bei der Registrierung";
        } else {
            $sql = "SELECT Email FROM nutzer WHERE '" . $_userEmail . "' = Email";
            $searchResult = mysqli_query($con,$sql);
            if(mysqli_num_rows($searchResult) > 0) {
                echo "Der Benutzer existiert bereits. Bitte logge dich ein!";
            } else {
                $insert = "INSERT INTO nutzer(Email, Passwort, Geburtsdatum, Username)VALUES ('$_userEmail', '$_userPassword', '$_userOld', '$_userName')";
                $result = mysqli_query($con, $insert);
                if ($result) {
                      header("Location: erfolgRegistriert.php");
                } else {
                    echo "Fehler bei der Registrierung";
                }
            }
        }
    }
    ?>

<br>
<a href="index.php">Hier gehts zur Anmeldung!<br></a>
</body>
<?php
    //TODO $_CON UND $_INSERT sollen in der Funktion verifikationDB() integriert werden

    function verificationData($_mailP, $_oldP) {

        if(!filter_var($_oldP, FILTER_VALIDATE_INT)) {
            echo "Geben Sie bitte gültige Alter <br />\n";
            return false;
        }
        if(!filter_var($_mailP, FILTER_VALIDATE_EMAIL)) {
            echo "Geben sie ein gültige Email bitteee! <br />\n";
            return false;
        }

    }

    function verrificationDataDB ($prüfung1) {
        if ($prüfung1 == false) {
            return 0;
        }

    }



