<?php
require 'constaints.php'; // Include database constants

// Check if the 'id' parameter is set
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the input

   // Connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed."]);
    exit;
}

    // Prepare the delete query
    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id); // Bind the 'id' parameter
        if ($stmt->execute()) {
            // Redirect to the dashboard with a success message
            header("Location:manage-categories.php?message=Gallery item deleted successfully");
        } else {
            // Redirect with an error message
            header("Location: manage-categories.php?error=Failed to delete the gallery item");
        }
        $stmt->close();
    } else {
        // Handle SQL preparation error
        header("Location: manage-categories.php?error=SQL query preparation failed");
    }

    $conn->close(); // Close the database connection
} else {
    // Redirect if 'id' parameter is missing
    header("Location: manage-categories.php?error=Invalid request");
    exit();
}
?>
