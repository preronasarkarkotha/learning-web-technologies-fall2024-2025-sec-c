<?php
// Include the database configuration file
include 'database.php';

// Initialize variables
$id = $event_name = $event_price = $payment_method = $event_items = $purchase_date = "";
$is_edit = false;

// Handle form submission for inserting or updating data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_name = trim($_POST['event_name']);
    $event_price = trim($_POST['event_price']);
    $payment_method = trim($_POST['payment_method']);
    $event_items = trim($_POST['event_items']);
    $purchase_date = trim($_POST['purchase_date']);

    // Check if editing or adding a new record
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update query
        $id = intval($_POST['id']);
        $sql = "UPDATE Purchases 
                SET event_name = '$event_name', 
                    event_price = '$event_price', 
                    payment_method = '$payment_method', 
                    event_items = '$event_items', 
                    purchase_date = '$purchase_date' 
                WHERE id = $id";
    } else {
        // Insert query
        $sql = "INSERT INTO Purchases (event_name, event_price, payment_method, event_items, purchase_date) 
                VALUES ('$event_name', '$event_price', '$payment_method', '$event_items', '$purchase_date')";
    }

    // Execute the query and handle errors
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_purchases.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle edit request
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $is_edit = true;
    $sql = "SELECT * FROM Purchases WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $event_name = $row['event_name'];
        $event_price = $row['event_price'];
        $payment_method = $row['payment_method'];
        $event_items = $row['event_items'];
        $purchase_date = $row['purchase_date'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Purchases</title>
</head>
<body>
    <div style="margin-bottom: 20px;">
        <a href="packageplan.php" style="text-decoration: none; padding: 10px 20px; background-color: #007BFF; color: white; border-radius: 5px;">Back to Event Guide</a>
    </div>
    <h1><?php echo $is_edit ? "Edit Purchase" : "Add Purchase"; ?></h1>
    <form action="purchase.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" value="<?php echo htmlspecialchars($event_name); ?>" required><br><br>

        <label for="event_price">Event Price:</label>
        <input type="number" id="event_price" name="event_price" value="<?php echo htmlspecialchars($event_price); ?>" step="0.01" required><br><br>

        <label for="payment_method">Payment Method:</label>
        <input type="text" id="payment_method" name="payment_method" value="<?php echo htmlspecialchars($payment_method); ?>" required><br><br>

        <label for="event_items">Event Items:</label>
        <input type="text" id="event_items" name="event_items" value="<?php echo htmlspecialchars($event_items); ?>" required><br><br>

        <label for="purchase_date">Purchase Date:</label>
        <input type="datetime-local" id="purchase_date" name="purchase_date" value="<?php echo htmlspecialchars($purchase_date); ?>"><br><br>

        <button type="submit"><?php echo $is_edit ? "Update Purchase" : "Add Purchase"; ?></button>
    </form>

    <h2>All Purchases</h2>
    <table border="1">
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
                        <a href="purchase.php?edit=<?php echo $row['id']; ?>">Edit</a>
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
