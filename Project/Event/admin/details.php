<?php
// Check if the header file exists
if (!file_exists('header.php')) {
    die('Error: header.php file not found!');
}

include 'header.php';
include 'database.php'; // Include your database connection

// Check if 'id' is passed
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the ID
    $query = "SELECT * FROM events WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $event = mysqli_fetch_assoc($result);
    } else {
        die("Event not found.");
    }
} else {
    die("No event selected.");
}
?>
<section class="singlepost">
<div class="container singlepost__container">
    <div class="singlepost_thumbnail">
        <img src="<?php echo htmlspecialchars($event['picture'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($event['event_name'], ENT_QUOTES, 'UTF-8'); ?>">
        <h5><?php echo htmlspecialchars($event['title'], ENT_QUOTES, 'UTF-8'); ?></h5>
        <h3><?php echo htmlspecialchars($event['event_name'], ENT_QUOTES, 'UTF-8'); ?></h3>
        <h3><?php echo htmlspecialchars($event['details'], ENT_QUOTES, 'UTF-8'); ?></h3>
    </div>
</div>
</section>

<?php
include '../partials/footer.php';
?>
