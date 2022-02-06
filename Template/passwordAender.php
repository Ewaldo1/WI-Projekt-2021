<body>
<?php include ("headerHekay.php"); ?>

<div class="container">
<br>
<h3>Passwort Ändern </h3>

<form method="post" action="passwordAender.php">
    <br>

    <div class="card">
        <div class="card-header">
            <h4> Anmeldung </h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                Geben Sie bitte ihre Daten ein:<br><br>

                <label>Gib hier ihr Email-Adresse</label>
                <input type="text" name= "email2" placeholder="E-Mail-Adresse" class="form-control">

                <label>Geben Sie hier Ihre alte Passwort</label>
                <input type="password" name = "oldPasswort" placeholder="aktuelle Passwort" class="form-control">

                <br> <br>

                <label>Geben Sie hier Ihre neue Passwort</label>
                <input type="password" name = "newPasswort" placeholder="neue Passwort" class="form-control">

                <label>wiederhollen Sie iher neue Passwort</label>
                <input type="password" name= "nePasswort2" placeholder="Passwort wiederhollen" class="form-control">



            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" type ="submit" name ="submit">neue Passwort bestätigen</button>
        </div>
    </div>

</form>
<br>
<br>
<a href ="datenAendern.php">zurück zum Einstellung</a>
<br>
<a href ="vorlageIndex.php">zurück zu starseite</a>
<br>
<br>
Überuns
<br>
<a href = "datenAendern.php"> Information über uns</a>

</div>

</body>
<br> <br> <br>
<footer>
    <?php include  "FooterHEKAY.php"; ?>
</footer>



<?php

require 'connectDB.php';

$passwordOld = $_POST["oldPasswort"];
$passwordNew = $_POST["newPasswort"];
$passwordNew2 = $_POST["nePasswort2"];
$email2 = $_POST["email2"];

#Kleine Prüfung am die Passwort
if(isset($_POST['submit'])) {

    //Hier wird überprüft ob die Neue Password richtig zweimal eingegeben wurdet



//Suche Option muss noch optimiert werden

    $sql = "SELECT Email FROM nutzer WHERE '" . $email2 . "' = Email";
    $searchResult = mysqli_query($con,$sql);

    if($searchResult) {
        echo "Verdad";
    }

    $eingeben = mysqli_num_rows($searchResult);

    if(mysqli_num_rows($searchResult) <= 0) {


    } else {

        setNewPassword($passwordNew, $passwordOld, $con);
    }


    if ($passwordNew == $passwordNew2) {
        echo ". $passwordOld .Passoworten sind ok <br/n>";
    } else {
        echo "Passworten sind nicht ok";
    }

}

function setNewPassword($givemeNew, $givemeOld, $givemeCon) {
    //    UPDATE `nutzer` SET `Email`=[value-1],`Passwort`=[value-2],`Geburtsdatum`=[value-3],`Username`=[value-4] WHERE 1

    $upDateThis = "UPDATE nutzer SET Passwort = '$givemeNew' WHERE Passwort =  '".$givemeOld."'  ";
//    $upDateThis = "UPDATE nutzer SET Passwort = '$givemeNew' WHERE ' ".$givemeOld."' = Passwort ";


    if($upDateThis) {
        echo "you are online! <br/n>";
    }
    $result2 = mysqli_query($givemeCon, $upDateThis);

    if($result2) {
        echo "You update this";
    } else {
        echo "Problem!!";
    }


}
echo "nada";
echo "<br>\n";
echo $eingeben;

//Hier muss ich noch schauen wie ich Seile in Datenbanken suchen kann und dann was ändern..
//Password wird nur auf sichere Grunde gefragt!