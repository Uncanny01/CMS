<?php

    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "cms";

    $serverun = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

    if(!$serverun)
    {
        die("ERROR: 404");
    }
?>