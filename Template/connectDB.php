<?php
//COPIE
$host = "localhost";
$user = "root";
$passwort = "root";
$db = "benutzersteuerung";
$con = null;
try {
    $con = new mysqli($host, $user, $passwort, $db);
} catch (mysqli_sql_exception $e){
    echo "Verbindung fehlgeschlagen ".$e->getMessage();
}

?>

