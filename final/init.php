<?php

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'final-task-db';

    $connection = mysqli_connect($hostname, $username, $password, $dbname);

    error_reporting(0);
    session_start();

?>