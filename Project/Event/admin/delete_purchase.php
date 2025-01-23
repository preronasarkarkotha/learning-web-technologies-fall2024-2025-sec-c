<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM Purchases WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_purchases.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
