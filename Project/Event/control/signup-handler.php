<?php
session_start();
header('Content-Type: application/json');
 
// Database connection
$servername = "localhost";
$username = "rimi"; // Your database username
$password = "rimi123"; // Your database password
$dbname = "blog"; // Your database name
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed."]);
    exit;
}
 
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['createpassword'];
    $avatar = $_FILES['avatar'];
 
    // Validation
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($avatar)) {
        echo json_encode(["success" => false, "error" => "All fields are required."]);
        exit;
    }
 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "error" => "Invalid email format."]);
        exit;
    }
 
    if (strlen($password) < 6) {
        echo json_encode(["success" => false, "error" => "Password must be at least 6 characters long."]);
        exit;
    }
 
    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
 
    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "error" => "Username or email already exists."]);
        exit;
    }
 
    // Handle avatar upload
    $targetDir = "../images/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
 
    $targetFile = $targetDir . basename($avatar["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
 
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        echo json_encode(["success" => false, "error" => "Only JPG, JPEG, PNG, and GIF files are allowed."]);
        exit;
    }
 
    if (!move_uploaded_file($avatar["tmp_name"], $targetFile)) {
        echo json_encode(["success" => false, "error" => "Failed to upload avatar."]);
        exit;
    }
 
    // Hash password and insert user
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 
    $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, email, password, avatar, is_admin) VALUES (?, ?, ?, ?, ?, ?, 0)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $username, $email, $hashedPassword, $targetFile);
 
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to register user."]);
    }
 
    $stmt->close();
}
 
$conn->close();
?>