<?php

$conn = new mysqli('localhost', 'root', '', 'event_reviews');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT name, rating, review FROM reviews ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Rating</th>
                <th>Review</th>
              </tr>
            </thead>
            <tbody>";
    // Output 
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['rating']) . "</td>";
        echo "<td>" . htmlspecialchars($row['review']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    
    echo "<p>No reviews yet. Be the first to review!</p>";
}


$conn->close();
?>
