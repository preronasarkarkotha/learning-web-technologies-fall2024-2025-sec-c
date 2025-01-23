<?php
require 'database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $event_name = $_POST['event_name'];
    $details = $_POST['details'];
    
    // Handle file upload
    $picturePath = 'images/' . basename($_FILES['picture']['name']);
    if (!is_dir('images')) {
        mkdir('images', 0777, true);
    }
    move_uploaded_file($_FILES['picture']['tmp_name'], $picturePath);

    // Insert data into the database
    $query = "INSERT INTO events (picture, title, event_name, details) VALUES ('$picturePath', '$title', '$event_name', '$details')";
    if (mysqli_query($conn, $query)) {
        header('Location: eventguide.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
