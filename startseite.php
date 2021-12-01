<?php
session_start();
include 'Header.php';
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
    <h2>Willkommen<?php echo $_SESSION["username"]; ?></h2> //funktioniert noch nicht
    Zum Ausloggen <a href ="logout.php">hier klicken</a>
    <section class="container" id="products">
    <div class="row">
        <div class="col">
            <?php include 'card.php' ?>
        </div>
        <div class="col">
            <?php include 'card.php' ?>
        </div>
        <div class="col">
            <?php include 'card.php' ?>
        </div>
        <div class="col">
            <?php include 'card.php' ?>
        </div>
    </div>

</section>

<script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>
