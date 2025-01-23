<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['name'])) {
    header('Location: login_view.php');
    exit;
}
$email = $_SESSION['email'];
$name = $_SESSION['name'];  
?>
<html lang="en">
<head>
    
    <title>Manage Events</title>
</head>
<body>
    <form action="event_management.php" method="post">
        <fieldset>
            <legend><h1><?php echo htmlspecialchars($name); ?>, <br> Manage All Events</h1></legend>
            <h3>Event Management</h3>
            <p>As an Admin, you can create, edit, or delete events here.</p>
            <p><a href="create_event_view.php">Create New Event</a></p>
            <p><a href="all_events_view.php">View All Events</a></p>
            <p><a href="adminD_view.php">Go back</a></p>
            
        </fieldset>
    </form>

    <br>
    <hr>
</body>
</html>
<?php include('footer.php'); ?>
