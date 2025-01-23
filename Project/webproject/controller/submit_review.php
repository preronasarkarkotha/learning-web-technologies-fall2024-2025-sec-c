<?php

$error_message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = trim($_POST['name']);
    $rating = $_POST['rating'];
    $review = trim($_POST['review']);

    
    if (empty($name)) {
        $error_message = "Name is required.";
    } elseif (empty($rating) || !is_numeric($rating) || $rating < 1 || $rating > 5) {
        $error_message = "Please provide a valid rating between 1 and 5.";
    } elseif (empty($review)) {
        $error_message = "Review cannot be empty.";
    }

    
    if (empty($error_message)) {
        
        $conn = new mysqli('localhost', 'root', '', 'event_reviews');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $name = mysqli_real_escape_string($conn, $name);
        $rating = mysqli_real_escape_string($conn, $rating);
        $review = mysqli_real_escape_string($conn, $review);

        $sql = "INSERT INTO reviews (name, rating, review) VALUES ('$name', '$rating', '$review')";

        if ($conn->query($sql) === TRUE) {
            
            echo json_encode(["success" => true]);
        } else {
            
            echo json_encode(["success" => false, "error" => "Error: " . $conn->error]);
        }

        
        $conn->close();
    } else {
       
        echo json_encode(["success" => false, "error" => $error_message]);
    }
}
?>
