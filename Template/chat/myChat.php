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

    <script type ="text/javascript">
        function ajax() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if(req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'chat.php', true);
            req.send();
        }

        //die macht immer eine Refesch jede sekunde!
        setInterval(function (){ajax();}, 1000)


    </script>



</head>

<body onload="ajax();">

<div id = "conteiner">
    <div id = "chat-box">
        <div id = "chat">



        </div>
        <form method="POST" action = "myChat.php">


            <textarea name = "Nachricht" placeholder="Gibt hier dein name"></textarea>
            <input type="text" name= "name3" placeholder="hier dein Name">
            <input type = "submit" name = "sender" value = "senden">

        </form>
        <?php


        if(isset($_POST['sender']))

            $nachricht = $_POST['Nachricht'];
            $name_chat = $_POST['name3'];


        $frage = "INSERT INTO chat(nameChat, nachricht) VALUES('$name_chat', '$nachricht')";
                $execute = $con->query($frage);



        ?>

    </div>

</div>


</body>

<footer>

</footer>

</html>

