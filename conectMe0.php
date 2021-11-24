<?php

class ConectBasse0 {

    public $_host;
    public $_user;
    public $_passwordDB;
    public $_datenBank;
    public $_w;

    public function __construct($wert) {
        echo "conectBasse Class aufgerufen";

        $_host = "locahost";
        $_user = "root";
        $_passwordDB = "";
        $_datenBank = "ewaldo";

        $_w = $wert;


        $_myServer = mysqli_connect($_host, $_user, $_passwordDB, $_datenBank);

    }
}

$CON = new ConectBasse0(3);


?>
