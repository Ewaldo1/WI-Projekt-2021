<!DOCTYPE html>
<html lang="en">

<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <?php include "headerStartSeite.php"?>
    <title>Registrirung</title>

    <!-- row -->
    </div>
     <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Registrierung</a></li>
                <li class="inactive" ><a href="login.php">Anmeldung</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<div class="container">

    <br><h4>Geben Sie ihre Daten ein:</h4>
    <form method="post" action="registBackEnd.php">
        <div class="card">
            <div class="card-body">
                <div class="form-group">

                    <label>Deine Email-Adresse</label>
                    <input type="text" name= "email" placeholder="Email" class="form-control">

                    <label>Dein Passwort</label>
                    <input type="password" name = "passwort" placeholder="Passwort" class="form-control">

                    <label>Dein Alter</label>
                    <input type="text" name= "geburtsdatum" placeholder="Alter" class="form-control">

                    <label>Dein Nutzername</label>
                    <input type="text" name= "userName" placeholder="Nutzername" class="form-control">

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type ="submit" name ="submit"> Hier gehts zur Registrierung</button>
            </div>
        </div>


        <br>

    </form>


</div>
    <?php include "FooterHekay.php"; ?>
</body>
</html>
