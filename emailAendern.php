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
$password = $_POST["passwort"];
$alteEmail = $_POST["oldEmail"];
$neueEmail = $_POST["newEmail"];

//Hier muss ich noch schauen wie ich Seile in Datenbanken suchen kann und dann was ändern..
//Password wird nur auf sichere Grunde gefragt!