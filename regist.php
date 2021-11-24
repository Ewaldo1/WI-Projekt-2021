
<body>

<h4>Geben Sie ihre Daten</h4>
<form method="post" action="regist.php">
    <br>

    <br>
    gib deine Email-Adresse:<br>
    <input name="email" size=16><br>
    gib deine Pasword:<br>
    <input name="password" size=12><br>
    gib Alter<br>
    <input name="old" size=8><br>
    gib deine User-Name<br>
    <input name="userName" size=1><br>
    <br>
    <input type="submit" name = "submit" value="Anmeldung" >

</form>



</body>


<?php

    require "WebShop/FileProbe.php";

    $_userEmail = $_POST["email"];
    $_userPassword = $_POST["password"];
    $_userOld = $_POST["old"];
    $_userName = $_POST["userName"];

   // $insertar = "INSERT INTO Rigister(email, password, name, geburtsDatum) VALUES ('$_email', '$_password', '$_name', '$_old')";
//REVISAR







?>