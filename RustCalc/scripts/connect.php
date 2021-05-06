<?php
session_start();
$servername = "jg1010.brighton.domains"; 
$username = "jg1010_GroupUser";
$password = "kZ,,_7vi#{L?";
$dbname = "jg1010_Group";

//Checking connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Checking connection
if($conn->connect_error)
{
    die("<br />Connection failed: " . $conn->connect_error);
}
?>