<html lang="en">
<head>
    <title>Event Report</title>
</head>
<body>

    <h1>Event Report</h1>

    <?php
    session_start();
    if (isset($_SESSION['user_message'])) {
        echo "<p><b>" . $_SESSION['user_message'] . "</b></p>";
        unset($_SESSION['user_message']);
    }
    ?>

    <form action="../controller/gr_controller.php" method="POST">
        <fieldset>
            <legend><b>Event Information</b></legend>

            <label for="event_id">Event ID:</label>
            <input type="number" id="event_id" name="event_id" required><br><br>

            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" required><br><br>

            <label for="event_description">Event Description:</label>
            <textarea id="event_description" name="event_description" required></textarea><br><br>

            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" required><br><br>

            <label for="event_location">Event Location:</label>
            <input type="text" id="event_location" name="event_location" required><br><br>

            <label for="organizer_name">Organizer Name:</label>
            <input type="text" id="organizer_name" name="organizer_name" required><br><br>

            <label for="participants">Participants:</label>
            <input type="number" id="participants" name="participants" required><br><br>

            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required><br><br>

            <input type="submit" value="Generate Report"><br><br>

            <p><a href="report.php">Go Back</a></p>
        </fieldset>
    </form>

</body>
</html>
<?php include('footer.php'); ?>
