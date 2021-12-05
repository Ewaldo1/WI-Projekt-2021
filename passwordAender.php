<body>
<?php include ("header.php"); ?>
<h3>Ändern sie ihre Email </h3>

<form method="post" action="passwordAender.php">
    <br>

    <br>
    Geben Sie iher Email <br>
    <input name="email2" size=20><br>
    Geben Sie ihre aktuelle Password:<br>
    <input name="oldPasswort" size=20><br>
    Geben Sie ihre neue Password:<br>
    <input name="newPasswort" size=20><br>
    Geben Sie ihre neuen noch ein mail<br>
    <input name="nePasswort2" size=20><br>

    <input type="submit" name = "submit" value="Bestätigen" >

</form>
<br>
<br>
<a href ="datenAendern.php">zurück zum Einstellung</a>
<br>
<a href ="startseie.php">zurück zu starseite</a>
<br>
<br>
Überuns
<br>
<a href = "datenAendern.php"> Information über uns</a>



</body>



<?php
$passwordOld = $_POST["oldPasswort"];
$passwordNew = $_POST["newPasswort"];
$passwordNew2 = $_POST["nePasswort2"];
$email2 = $_POST["email2"];

#Kleine Prüfung am die Passwort
if(isset($_POST['submit'])) {

    //Hier wird überprüft ob die Neue Password richtig zweimal eingegeben wurdet

    $sql = "SELECT Email, Passwort FROM nutzer WHERE '" . $email2 . "' = Email";

    if ($passwordNew == $passwordNew2) {
        echo ". $passwordOld .Passoworten sind ok <br/n>";
    } else {
        echo "Passworten sind nicht ok";
    }
//    UPDATE `nutzer` SET `Email`=[value-1],`Passwort`=[value-2],`Geburtsdatum`=[value-3],`Username`=[value-4] WHERE 1
    $upDateThis = "UPDATE nutzer SET Passwort = '$passwordNew' WHERE ' ".$passwordOld."' = Passwort ";


    if($upDateThis) {
        echo "you are online! <br/n>";
    }
    $result2 = mysqli_query($con, $upDateThis);

    if($result2) {
        echo "You update this";
    } else {
        echo "Problem!!";
    }

}

//Hier muss ich noch schauen wie ich Seile in Datenbanken suchen kann und dann was ändern..
//Password wird nur auf sichere Grunde gefragt!