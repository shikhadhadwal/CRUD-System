<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "php_tutorial";

$conn = mysqli_connect($servername, $username, $password, $databasename);
if(!$conn){
    echo mysqli_connect_error($conn);
}

?>