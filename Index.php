<?php include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<section class="container">
<form action = "index.php" method = "post">
    <div class="card">
        <div class="card-header">
            <h4> Anmeldung </h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                Geben Sie bitte ihre Daten ein:<br><br>
                <label>Username</label>
                <input type="text" name= "username" placeholder="Username" class="form-control">
                <label>Passwort</label>
                <input type="password" name = "passwort" placeholder="Passwort" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" type ="submit" name ="submit">Login</button>
        </div>
    </div>
</section>
</form>

<?php
if(isset($_POST["submit"])){
    require 'connectDB.php';
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];
    $sql = "SELECT * FROM nutzer WHERE '" . $username . "' = Username AND '" .$passwort ."' = Passwort"; //Nutzer wird in Tabelle gesucht
    $result = mysqli_query($con, $sql);

    if(false === (bool)$username){
        echo "Feld des Benutzers leer";
    } else if(false === (bool)$passwort){
        echo "Passwortfeld ist leer";
    } else if(mysqli_num_rows($result) > 0) { //prüfen ob Nutzer gefunden
        session_start();
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["username"] = $username;
            $_SESSION["passwort"] = $passwort;
        }
            header("Location: startseite.php");
    } else {
        echo "Benutzername oder Passwort falsch";
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


