<?php

function getDBConnection(){
    $host = "localhost";
    $user = "dbuser";
    $pass = "dbdev123";
    $database = "phpclass";
    return mysqli_connect($host, $user, $pass, $database);
}