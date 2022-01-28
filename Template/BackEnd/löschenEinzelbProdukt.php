<?php


//Hier wird das Backend verwenden, um Produkte aus dem Warenkorb zu entfernen!

include "../connectDB.php"; //Daten bank anfragen anrufen.
include "../Datenbank/dbOperationen.php";

session_start();

$dbOperation = new dbOperationen();
$nutzername = $_SESSION["username"];
$nutzerId = $dbOperation->getUserID($con, $nutzername);

$dieseProduktID =$_SESSION["aktuelleProduktID"];

$dbOperation->deleteProductWarenkorb($con, $dieseProduktID, $nutzerId);


header("Location: ../warenkorb.php");

?>