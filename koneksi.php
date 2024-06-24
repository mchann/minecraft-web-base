<?php
$servername = "localhost";
$database = "mcbase";
$username = "root";
$password = "";
 
// Create connection
 
$koneksi = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
 
if (!$koneksi) {
 
    die("Connection failed: " . mysqli_connect_error());
 
}
?>