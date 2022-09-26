<?php

    $host       =   "localhost";
    $user       =   "root";
    $pass       =   "";
    $database   =   "users";

    $conn       =   new mysqli($host, $user, $pass, $database);

    if($conn->connect_error)
    {
        die("Connection Failed : ".$conn->connect_error);
    }
    else
    {
        echo "Connected Successfully";
    }
?>