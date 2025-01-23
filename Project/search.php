<?php
require 'config/database.php';  // Include the database connection

if (isset($_GET['query'])) {
    $searchTerm = $_GET['query'];

    // Sanitize the search term
    $searchTerm = htmlspecialchars($searchTerm);
    $searchTerm = $conn->real_escape_string($searchTerm);

    // SQL query to search posts
    $sql = "SELECT title, body, thumbnail, category FROM posts WHERE title LIKE ? OR body LIKE ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("ss", $likeSearchTerm, $likeSearchTerm);
    $likeSearchTerm = '%' . $searchTerm . '%';

    $stmt->execute();
    $result = $stmt->get_result();

    $posts = [];
    while ($post = $result->fetch_assoc()) {
        $posts[] = $post;
    }

    header("Location: index.php?results=" . urlencode(json_encode($posts)));
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
