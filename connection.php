<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$welcome_name = "";
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>

