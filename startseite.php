<?php
include 'Header.php';
include 'connectDB.php';
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
<section class="container">
    <h2>Hallo<?php echo " ".$_SESSION["username"]; ?></h2>
    Zum Ausloggen <a href ="logout.php">hier klicken</a><br>
    Um zu deinem Profil zu gelangen <a href ="benutzerseite.php">hier klicken</a>
    <br><br><br>
    Zum Einstellung <a href ="datenAendern.php">hier klicken ;)</a>
</section>

<?php  //Definiere eindeutige Route für Cards.
$url = $_SERVER['REQUEST_URI'];
$indexPHPPosition = strpos($url, 'startseite.php');
$route = substr($url, $indexPHPPosition);
$route = str_replace('startseite.php', '', $route);

if(strpos($route,'/warenkorb/add/') !== false) {
    $routeParts = explode("/", $route); //ProduktID befindet sich an der dritten Stelle, somit:
    $produktID = (int) $routeParts[3]; //Stelle aus der URL auslesen und der Variablen produktID übergeben
    $Nutzer_ID = 1;
    $insertSql = "INSERT INTO warenkorb (Produkt_ID, Nutzer_ID, Menge, Angelegt) VALUES ('$produktID', '$Nutzer_ID', '1', '2021-12-16')";
    $insertResult = mysqli_query($con, $insertSql);
    header("Location: /startseite.php");
    exit();
}
?>


<section class="container" id="products">
    <div class="row"> <?php //eine Zeile für die Cards?>
        <?php while($row = $result->fetch_assoc()): //while wird hier mit ":" unterbrochen?>
            <div class="col"> <?php //jeweils eine Spalte pro Card?>
                <?php include 'card.php' //Ausgabe der einzelnen Cards solange es Eintrage in DB-Tabelle gibt?>
            </div>
        <?php endwhile; //hier wird die while dann abgeschlossen?>
    </div>

</section>

<?php
include 'Probe.php';
?>

<script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>





