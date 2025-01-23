<?php
// Database connection
require 'database.php';

// Fetch purchases data
$sql = "SELECT event_name, event_price, payment_method, event_items, purchase_date FROM Purchases";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchases</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Purchases</h1>
    <table>
        <thead>
            <tr>
            <th>ID</th>
                <th>Event Name</th>
                <th>Event Price</th>
                <th>Payment Method</th>
                <th>Event Items</th>
                <th>Purchase Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM Purchases";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['event_name']); ?></td>
                    <td><?php echo number_format($row['event_price'], 2); ?></td>
                    <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                    <td><?php echo htmlspecialchars($row['event_items']); ?></td>
                    <td><?php echo htmlspecialchars($row['purchase_date']); ?></td>
                    <td>
                        <a href="manage_purchases.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete_purchase.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
