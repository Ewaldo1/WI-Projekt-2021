<head>


    <?php
    include "headerStartSeite.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>



<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="regist.php">Registrierung</a></li>
                <li lass="inactive" ><a href="login.php">Anmeldung</a></li>
                <li class="inactive" ><a href="login.php">kontaktieren Sie uns</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->



    <div class="container">

        <br><h4>Password Rücksetzen:</h4>
        <form method="post" action="BackEnd/vergessenBackEnd.php" class="needs-validation" novalidate>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">

                        <label>Deine Email-Adresse</label>
                        <input type="text" class="form-control" id="email"  placeholder="Email"  name= "email" required>

                        <label>Dein Nutzername</label>
                        <input type="text" class="form-control" id="userName" placeholder="Nutzername" name = "userName" required>

                        <label>Dein Alter</label>
                        <input type="text" class="form-control" id="geburtsdatum" placeholder="Alter" name = "geburtsdatum" required>

                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type ="submit" name ="submit"> Anfragen schicken</button>
                </div>
            </div>


            <br>

        </form>
        <!--Quelle: https://www.w3schools.com/bootstrap4/bootstrap_forms.asp-->
        <script>
            //es wird geprüft, ob es unausgefüllte Felder gibt, wenn ja wird die Meldung für invalid-feedback ausgegeben
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>


    </div>



</body>

<footer>

    <?php
        include "FooterHEKAY.php";
    ?>

</footer>
