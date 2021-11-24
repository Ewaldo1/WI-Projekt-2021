
<?php
echo "ganz normale seite";

?>


<head>
    <meta charset="uft-8">
    <title>Nutzerverwaltung</title>

</head>

<body>

    <h2>Willkommen!</h2>
    <h4> Anmeldung </h4>

    <form method = "post" action = "speichern.php">

        e-Mail: <input name="email" size=15> <br>
        password: <input name="password"size15> <br>
        Vollständige Name: <input name="userName"size15> <br>
        Alter: <input name="userOld"size15> <br>


        <input type = "submit" name = "submit" value = "Speichern">


    </form>

</body>
