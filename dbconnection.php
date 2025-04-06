<?php
$servername = "sql211.epizy.com";
$username = "epiz_32227611";
$password = "CpQQb5oRtDI";
$database = "epiz_32227611_sep1";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
}
?>