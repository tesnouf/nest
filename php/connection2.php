<?php
$servername = "OMV.local";
$username = "yard";
$password = "RavgAsJhcvBazukGmE4VgDnD";
$database = "yard";
$port = "3306";

// Create connection
$conn2 = new mysqli($servername, $username, $password, $database, $port); 
// ->options(MYSQLI_OPT_LOCAL_INFILE, true);
// $con = mysqli_init(); $con->options(MYSQLI_OPT_LOCAL_INFILE, true);

session_start();

// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}



// Needed for login php script at header of page This is ion PDO I need MYSQLi!!
// $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
//     try { $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); } 
//     catch(PDOException $ex){ die("Failed to connect to the database: " . $ex->getMessage());} 
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
//     $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
//     header('Content-Type: text/html; charset=utf-8'); 
//     session_start(); 
?>