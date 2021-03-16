<?php

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'users';

    $connection = mysqli_connect($hostname, $username, $password, $dbname);

    // starting global session
    session_start();

?>