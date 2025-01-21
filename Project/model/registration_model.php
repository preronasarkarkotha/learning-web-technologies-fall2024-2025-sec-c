<?php

function dbConnect() {
    $con = mysqli_connect('localhost', 'root', '', 'db');
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function insertUser($data) {
    $con = dbConnect();
    $stmt = $con->prepare("INSERT INTO reg (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $data['name'], $data['email'], $data['password']);
    $stmt->execute();
    $result = !$stmt->errno;
    $stmt->close();
    $con->close();
    
    return $result;
}
?>
