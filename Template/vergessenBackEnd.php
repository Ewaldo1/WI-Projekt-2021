<?php
require 'connectDB.php';
//session_start();
$_userEmail = $_POST["email"];
$_userOld = $_POST["geburtsdatum"];
$_userName = $_POST["userName"];

if(isset($_POST['submit'])) {
    // Anfragen ob zu überprüfen ob die Daten passen

    $sql = "SELECT Username FROM nutzer WHERE '" .$_userName. "' = Username  AND '" .$_userEmail."' = Email  
            AND '".$_userOld. "' = Geburtsdatum";

    $anfragen = mysqli_query($con,$sql);

    //Überprüfung ob die Kombination Existiert
    if(mysqli_num_rows($anfragen) > 0) {

        ?>
        <br><div class="alert alert-danger"> <strong><?php echo "Email würde gesendet."?></strong></div> <?php

    } else {

        echo "Überprüfen Sie ihren Daten";
    }
}

?>