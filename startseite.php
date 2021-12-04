<?php
session_start();
include 'Header.php';
include 'connectDB.php';

//Kevin das muss du uns erklären! :D

$sql = "SELECT * FROM produkte";
$result = mysqli_query($con, $sql); //Inhalte der Tabelle Produkte
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script scr="" type=""></script>
    <meta charset="utf-8">
    <title></title>
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="assets/css/styles.css"/>
</head>
<body>
    <h2>Willkommen<?php echo " ".$_SESSION["username"]; ?></h2>

    Zum Ausloggen <a href ="logout.php">hier klicken</a>
    Um zu deinem Profil zu gelangen <a href ="benutzerseite.php">hier klicken</a>

    <section class="container" id="products">
    <div class="row"> <?php //eine Zeile für die Cards?>
        <?php while($row = $result->fetch_assoc()): //while wird hier mit ":" unterbrochen?>
        <div class="col"> <?php //jeweils eine Spalte pro Card?>
            <?php include 'card.php' //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt?>
        </div>
        <?php endwhile; //hier wird die while dann abgeschlossen?>
    </div>

</section>

<script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>
