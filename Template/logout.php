<?php
session_start();
if(session_destroy()) {

    include BackEnd/online.php;
    $onlineR = false;
    header("Location: login.php");
}