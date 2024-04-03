<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $db_hostname = "localhost";
    $db_username = "88890";
    $db_password = "NYGz3s9L27";
    $db_database = "db_88890";

    $mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);


    if($mysqli->connect_error) {
        echo "FOUT: geen database connectie <br>";
        echo "Error:" . mysql->connect_error . "<br>";
    } else {
        echo "Verbinding met " . $db_database . " is gemaakt <br>";
    }

    //uzername 88890
    //wachtwoord NYGz3s9L27
    //wauwie ik hou van meggings -aron
    //ik draag iederen dag meggings -aron