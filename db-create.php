<?php
// Database creation
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  // echo "Connected successfully";
}

// Database Creation
//$sql = "CREATE DATABASE demo";

//if ($conn->query($sql) === TRUE) {
 // echo "Database Created";
//} else {
 // echo "Error: " . $conn->error;
//}

// Database connect
$dbname = "demo";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
