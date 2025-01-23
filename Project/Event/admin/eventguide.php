<?php
include 'header.php';
include 'database.php'; // Database connection

// Fetch events from the database
$query = "SELECT * FROM events";
$result = mysqli_query($conn, $query);
?>

<h5>Event Guide</h5>
<div class="event-container">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="event-card">
            <img src="<?php echo $row['picture']; ?>" alt="<?php echo $row['event_name']; ?>">
            <h3><?php echo $row['title']; ?></h3>
            <p><?php echo $row['event_name']; ?></p>
            <a href="details.php?id=<?php echo $row['id']; ?>" class="details-btn">Details</a>

        </div>
    <?php endwhile; ?>
</div>

<!-- Modal for Details -->
<div id="detailsModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="eventDetails"></p>
    </div>
</div>

<script src="../js/eventscript.js"></script> <!-- Link to JS validation and modal script -->

<?php
include '../partials/footer.php';
?>
