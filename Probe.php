<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Menu - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#menu" ).menu();
        } );
    </script>
    <style>
        .ui-menu { width: 180px; }
    </style>
</head>
<body>

<ul id="menu">

    <li><div>Porfil Einstellungen</div></li>
    <li><div>Ändern dein..</div>
        <ul>
            <li class="ui-state-disabled"><div>Porfil Status</div></li>
            <li><div>Email</div></li>
            <li><div>Password</div></li>
            <li><div>Porfild Bild</div></li>
        </ul>
    </li>
    <li><div>Abmelden</div></li>
    </li>
</ul>


</body>
</html>
