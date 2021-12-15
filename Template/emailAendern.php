<body>
<?php include ("header.php"); ?>
<h3>Ändern sie ihre Email </h3>

<form method="post" action="emailAendern.php">
    <br>


    <br>
    Geben Sie ihre Password:<br>
    <input name="passwort" size=20><br>
    Geben Sie ihre Email:<br>
    <input name="oldEmail" size=20><br>
    Geben Sie ihre neuen Email<br>
    <input name="newEmail" size=20><br>

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

require 'connectDB.php';

$password = $_POST["passwort"];
$alteEmail = $_POST["oldEmail"];
$neueEmail = $_POST["newEmail"];


if(isset($_POST['submit'])) {

    //Hier wird überprüft ob die Neue Password richtig zweimal eingegeben wurdet



//Suche Option muss noch optimiert werden

    $sql = "SELECT Email FROM nutzer WHERE '" . $alteEmail . "' = Email";
    $searchResult = mysqli_query($con,$sql);

    if(mysqli_num_rows($searchResult) <= 0) {
        echo "Falsche Email eingeben";

    } else {
        echo "Rictige Email <br/n>";
        setNewEmail($alteEmail, $neueEmail, $con);
    }




}



function setNewEmail($givemeOldE, $givemeNewE, $givemeCon) {
    //    UPDATE `nutzer` SET `Email`=[value-1],`Passwort`=[value-2],`Geburtsdatum`=[value-3],`Username`=[value-4] WHERE 1

    $upDateThis = "UPDATE nutzer SET Email = '$givemeNewE' WHERE Email =  '".$givemeOldE."'  ";


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


//Hier muss ich noch schauen wie ich Seile in Datenbanken suchen kann und dann was ändern..
//Password wird nur auf sichere Grunde gefragt!