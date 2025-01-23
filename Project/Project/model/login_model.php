<?php

function dbConnect() {
    $con = mysqli_connect('localhost', 'root', '', 'db');
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function checkUserCredentials($email, $password) {
    $con = dbConnect();
    $stmt = $con->prepare("SELECT * FROM reg WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['password'] === $password) {
            return $user;
        }
    }
    
    return false;
}
?>
