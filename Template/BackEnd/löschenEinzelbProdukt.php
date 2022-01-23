<?php


//Hier wird die backand verwenden um produkte aus der Warenkorb zu löschen!

include "../connectDB.php"; //Daten bank anfragen anrufen.
include "../Datenbank/dbOperationen.php";

session_start();

$dbOperation = new dbOperationen();
$nutzername = $_SESSION["username"];
$nutzerId = $dbOperation->getUserID($con, $nutzername);

$dieseProduktID =$_SESSION["aktuelleProduktID"];

$dbOperation->deleteProductWarencorb($con, $dieseProduktID, $nutzerId);


header("Location: ../warenkorb.php");

//$warenkorbInhalt['Menge'];



?>