<?php

//include ("Taschenrechner/FileProbe.php");
require "Taschenrechner/FileProbe.php";



$_email = $_POST["email"];
$_password = $_POST["password"];
$_name = $_POST["userName"];
$_old = $_POST["userOld"];
//kunde für Database
$_conex = new mysqli("localhost", "root", "root", "ewaldo");

if($_conex) {

    echo "conectado ";
} else {
    echo "dont conect";
}


$insertar = "INSERT INTO usuarios(email, password, name, geburtsDatum) VALUES ('$_email', '$_password', '$_name', '$_old')";

var_dump($insertar);

$result = mysqli_query($_conex, $insertar);

if($result) {
    echo "alles prima";
} else{
    var_dump($result);
    echo "Fehler sind aufgetroffen";
}



?>