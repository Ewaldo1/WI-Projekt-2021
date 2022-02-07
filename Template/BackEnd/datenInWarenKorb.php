<?php
include  "../connectDB.php";
include "../Datenbank/dbOperationen.php";
session_start();

if(isset($_SESSION["username"])){
    $nutzername = $_SESSION["username"];
} else {
    $nutzername = 0;
}
$dbOperation = new dbOperationen();
$nutzerId = $dbOperation->getUserID($con, $nutzername);

//$frage = "SELECT Produkt_ID, Tiel, Preis FROM warenkorb WHERE '".$nutzerId."' = Nutzer_ID ";

$frage = "SELECT Produkt_ID, Tiel, Preis FROM warenkorb INNER JOIN produkte ON warenkorb";

$execute = $con->query($frage);
//$gekaufteProdukten = $execute->fetch_array();
$gekaufteProdukten = mysqli_fetch_array($execute);

echo "Use ist = ";
echo $_SESSION["username"];

echo "<br>\n";

echo $gekaufteProdukten[0] ;
echo $gekaufteProdukten[1];
echo $gekaufteProdukten[2];
/*
for ($i = 0; $i < count($gekaufteProdukten); $i++) {
echo $i;
    echo $gekaufteProdukten[$i];

    //$productFragen = "SELECT * FROM produkte WHERE '".$nutzerId."' = Nutzer_ID ";
}
