<?php
// Ensure the path is correct and matches your structure
require 'constaints.php';

// Connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed."]);
    exit;
}
