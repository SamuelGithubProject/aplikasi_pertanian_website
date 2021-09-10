<?php
$servername = "localhost";
$username = "adry2296_localhost";
$password = "manajemeninformatika18";
$dbname = "adry2296_aplikasipertanian";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
