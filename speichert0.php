<?php

include  "conectMe.php";
require  "conectMe0.php";




class Speicher0 {
    public function __construct ($mail, $password, $name, $alter){
        echo "Kalsse speicher0 erzeugt!";

        $mail = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["userName"];
        $alter = $_POST["userOld"];


    }

}



?>
