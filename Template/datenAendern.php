<?php



?>

<body>
<header>
    <?php include "HeaderHEKAY.php";

    include BackEnd/online.php;

    //False nicht man online ist man wir nach login geschickt!
    if(onlineR === false) {

        echo "false!";
        header("Location: login.php");
    }


    ?>
<title> Änderungen </title>


</header>

<div class="container">

<h3>Was möchten Sie hier ändern? </h3>

<br>
<br>

    <div class="alert alert-info">
        <strong>deine Email ändern</strong> clicken Sie  <a href="emailAendern.php" class="alert-link" color = "red">hier!</a>.
    </div>
    <div class="alert alert-info">
        <strong>deine Passwort ändern</strong> clicken Sie <a href="passwordAender.php" class="alert-link" color = "red">hier!</a>.
    </div>

    <div class="alert alert-info">
        <strong>Porfil Bild ändern</strong> clicken Sie <a href="passwordAender.php" class="alert-link" color = "red">hier!</a>.
    </div>

    <div class="alert alert-info">
        <strong>Information über uns</strong> clicken Sie <a href="#" class="alert-link" color = "red">hier!</a>.
    </div>



<br> <br> <br> <br> <br> <br>


</div>

</body>

<footer>
    <?php include "FooterHEKAY.php" ?>

</footer>