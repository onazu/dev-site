<?php

$dbhost = "mysql";
$dbuser = "root";
$dbpass = "secret";
$dbname = "mydb";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)) {
    die("failed to connect to db");
}
?>