<?php
echo "hallo welte   ";
require '../connectDB.php';
session_start();
$_userEmail = $_POST["email"];
$_userOld = $_POST["geburtsdatum"];
$_userName = $_POST["userName"];

if(isset($_POST['submit'])) {

    // Anfragen ob zu überprüfen ob die Daten passen

    $sql = "SELECT Email FROM nutzer WHERE '" . $_userEmail . "' = Email AND " .$_userName." = Username";
    $searchResult = mysqli_query($con,$sql);

    echo "Adeu";
    if(mysqli_num_rows($searchResult) > 0) {
        echo "Hallo";
        ?>
        <br><div class="alert alert-danger"> <strong><?php echo "Ihre Daten sind richtig."?></strong></div> <?php

    }

}

?>