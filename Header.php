<?php
    include "connectDB.php";
    session_start();
    $Nutzer_ID = 1; //SELECT ID FROM nutzer WHERE Username = $username;
    $inhalte = 0;
    if(isset($_SESSION["Nutzer_ID"])){
        $Nutzer_ID = $_SESSION["Nutzer_ID"];
    }
    $sqlWK ="SELECT * FROM warenkorb WHERE Nutzer_ID =".$Nutzer_ID;
    $warenkorbResult = mysqli_query($con, $sqlWK);
    $inhalte = $warenkorbResult->num_rows;
?>
<html>
<head>
    <script scr="" type=""></script>
    <meta charset="utf-8">
    <title>HEKAY.de: Top Produkte zu günstigen Preisen!</title>
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="assets/css/styles.css"/>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Willkommen auf HEKAY!</h1>
        <img src="Logo.jpg" height="100px" width="100px">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                Warenkorb(<?= $inhalte ?>)
            </li>
        </ul>
    </nav>
</div>
</body>
</html>

<?php
