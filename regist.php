
<body>
<?php include ("header.php"); ?>
<h4>Geben Sie ihre Daten</h4>
<form method="post" action="regist.php">
    <br>

    <br>
    gib deine Email-Adresse:<br>
    <input name="email" size=16><br>
    gib deine Pasword:<br>
    <input name="password" size=10><br>
    gib Alter<br>
    <input name="old" size=5><br>
    gib deine User-Name<br>
    <input name="userName" size=10><br>
    <br>
    <input type="submit" name = "submit" value="Anmeldung" >

</form>


</body>


<?php

    require "conectDB.php";

    $_userEmail = $_POST["email"];
    $_userPassword = $_POST["password"];
    $_userOld = $_POST["old"];
    $_userName = $_POST["userName"];

    //HIER WIRD ÜBERPRÜFT ob gab RICHTIGE ABGABE bei EMAIL UND ALTER

    $prüfung1 = verificationData($_userEmail, $_userOld);



    //Die Tabelle BENUTZER Enthählt info von unsere Users!

    $insert = "INSERT INTO benutzer(email, password, geburtsDatum, UserName)VALUES ('$_userEmail', '$_userPassword', '$_userOld', '$_userName')";
    $result = mysqli_query($_conex, $insert);


    //TODO $_CONEX UND $_INSERT sollen in der Funktion verifikationDB() integriert werden

    if($result) {
        echo "Sind Sie jetzt registiert";
    } else{
        var_dump($result);
        echo "Fehler bei Regestrierung";
    }



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



?>