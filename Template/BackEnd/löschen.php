<script type = "text/javascript">
    function ConfirmAllDelete()
    {
        var antwort = confirm(Sind Sie sicher dass sie alle Produkte aus warenkorb löschen wollen?);

        if(antwort == true)
        {
            return true;
        }
        else
        {
            return false
        }
    }

</script>


<?php
//Hier wird die backand verwenden um produkte aus der Warenkorb zu löschen!

include "../connectDB.php"; //Daten bank anfragen anrufen.
include "../Datenbank/dbOperationen.php";

session_start();

$dbOperation = new dbOperationen();
$nutzername = $_SESSION["username"];
$nutzerId = $dbOperation->getUserID($con, $nutzername);


$dbOperation->deleteAllProducts($con, $nutzerId);



header("Location: ../warenkorb.php");

