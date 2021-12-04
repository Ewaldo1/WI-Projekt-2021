<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<section class="container">
    <h4> Anmeldung </h4>
</section>
<form action = "index.php" method = "post">
    <section class="container">
        Geben Sie bitte ihre Daten ein: <br><br>
        <label>Username:</label>
        <input type="text" name= "username" placeholder="Username"><br>
        <label>Passwort:</label>
        <input type="password" name = "passwort" placeholder="Passwort"><br><br>
        <input type = "submit" name = "submit" value = "Einloggen">
    </section>
</form>

<?php
if(isset($_POST["submit"])){
    require 'connectDB.php';
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];
    $sql = "SELECT * FROM nutzer WHERE '" . $username . "' = Username AND '" .$passwort ."' = Passwort"; //Nutzer wird in Tabelle gesucht
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) { //prüfen ob Nutzer gefunden
        session_start();
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["username"] = $username;
            $_SESSION["passwort"] = $passwort;
        }
            header("Location: startseite.php");
    } else {
        echo "Username oder Passwort falsch!";
    }
}
?>
<section class="container">
    <br>
    <a href="regist.php">Noch keinen Account? Hier Registrieren!<br></a>
    <a href="help.php">Probleme beim Anmelden?<br></a>
</section>
</body>
</html>


