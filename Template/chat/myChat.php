<?php
    include "DBchat.php";
?>

<html>

<head>
    <title> Chat </title>
    <link rel = "stylesheet" type="text/css" href="myStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200&display=swap" rel="stylesheet">
</head>

<body>

<div id = "conteiner">
    <div id = "chat-box">
        <div id = "chat">
            <?php
            $frage = "SELECT * FROM chat ORDER BY id DESC";
            $execute = $conexion->query($frage);
            while($zeile = $execute->fetch_array()):

            ?>

            <div id = daten-chat>
                <span style="color: #1c62c4"> Ewaldo </span>
                <span style = "color: #848484"> Hello World! </span>
                <span style="float: right"> 11:24 </span>
            </div>

            <?php endwhile; ?>
            

        </div>
        <form method="POST" action = "index.php">

            <input type ="text" name = "nombre" placeholder= "Hier kommt deien Name">
            <textarea name = "Nachricht" placeholder="Gibt hier dein name"> </textarea>
            <input type = "submit" name = "sender" value = "senden">


        </form>
    </div>

</div>


</body>

<footer>

</footer>

</html>

