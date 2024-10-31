<?php
$servername = "localhost";
$username = "root";
$password = "root";
$bdBiblioteca = "biblioteca";

// Create connection
$conn = new mysqli($servername, $username, $password, $bdBiblioteca);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>