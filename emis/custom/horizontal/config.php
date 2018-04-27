<?php
/*
$servername = "192.169.82.14";
$username = "alahbabg_alahbabg";
$password = "a1q2u3a4s5";
$dbname = "alahbabg_aquas";
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aquas_inventory_sys";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>