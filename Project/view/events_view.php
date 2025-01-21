<?php
include_once '../controller/events_controller.php';
?>

<html lang="en">
<head>
    <title>All Events</title>
</head>
<body>
    <h2>All Events</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Event No</th>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($all_events as $event): ?>
                    <tr>
                        <td><?php echo $event['event_no']; ?></td>
                        <td><?php echo $event['event_name']; ?></td>
                        <td><?php echo $event['event_description']; ?></td>
                        <td><?php echo $event['event_date']; ?></td>
                        <td><?php echo $event['event_location']; ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    <p><a href="customerD_view.php">Go Back</a></p>
   
</body>
</html>
<?php include('footer.php'); ?>
