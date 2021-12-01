<?php include ("header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h4> Anmeldung </h4>

<form action = "index.php" method = "post">
    Geben Sie bitte ihre Daten ein: <br><br>
    Username: <input name = "username" <br><br>
    Passwort: <input name = "passwort" <br><br>
    <input type = "submit" name = "submit" value = "Einloggen">
</form>

<?php
session_start();
if(isset($_POST["submit"])){
    require 'connectDB.php';
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];
    $sql = "SELECT * FROM nutzer WHERE '" . $username . "' = Username AND '" .$passwort ."' = Passwort"; //Nutzer wird in Tabelle gesucht
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) { //prüfen ob Nutzer gefunden
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["passwort"] = $row["passwort"];
        }
            header("Location: startseite.php");
    } else {
        echo "Username oder Passwort falsch!";
    }
}
?>
<br>
<a href="regist.php">Noch keinen Account? Hier Registrieren!<br></a>
<a href="help.php">Probleme beim Anmelden?<br></a>
</body>
</html>


