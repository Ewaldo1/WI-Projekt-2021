<script type = "text/javascript">
    function ConfirmAllDelete()
    {
        var antwort = confirm(Sind Sie sicher dass sie alle Produkte aus dem Warenkorb entfernen wollen?);

       return antwort;

</script>


<?php
//Hier wird das Backend verwendet, um Produkte aus dem Warenkorb zu entfernen!

include "../connectDB.php"; //Datenbank anfragen anrufen.
include "../Datenbank/dbOperationen.php";

session_start();

$dbOperation = new dbOperationen();
$nutzername = $_SESSION["username"];
$nutzerId = $dbOperation->getUserID($con, $nutzername);


$dbOperation->deleteAllProducts($con, $nutzerId);



header("Location: ../warenkorb.php");

