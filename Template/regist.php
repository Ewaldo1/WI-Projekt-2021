<!DOCTYPE html>
<html lang="en">

<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <?php include "HeaderHEKAY.php"?>
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

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Registrierung</h3>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- Hier soll meine Anmeldung formular kommen -->
    <!-- /container -->



</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="container">

    <h4>Geben Sie ihre Daten an</h4>
    <form method="post" action="registBackEnd.php">
        <div class="card">
            <div class="card-header">
                <h4> Anmeldung </h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    Geben Sie bitte ihre Daten ein:<br><br>

                    <label>Deine Email-Adresse</label>
                    <input type="text" name= "email" placeholder="email" class="form-control">

                    <label>Deine Password</label>
                    <input type="password" name = "passwort" placeholder="dein Password" class="form-control">

                    <label>gibt hier dein Alter</label>
                    <input type="text" name= "geburtsdatum" placeholder="dein Alter" class="form-control">

                    <label>Deine User Name</label>
                    <input type="text" name= "userName" placeholder="Userame" class="form-control">

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type ="submit" name ="submit">Registrierung</button>
            </div>
        </div>


        <br>

    </form>


</div>
<!-- FOOTER -->
<footer>
    <?php include "FooterHekay.php"; ?>
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
