<?php
<<<<<<< HEAD
=======
//COPIE
>>>>>>> bda31b810b4bc366f14d99cc19f621c544d02a4e
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
<<<<<<< HEAD
=======

>>>>>>> bda31b810b4bc366f14d99cc19f621c544d02a4e
?>

