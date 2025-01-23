<?php
include_once '../controller/all_events_controller.php';
?>

<html lang="en">
<head>
    <title>All Events</title>
    <script>
        function filterEvents() {
            let input = document.getElementById('eventSearch');
            let filter = input.value.toUpperCase();
            let table = document.getElementById('eventsTable');
            let rows = table.getElementsByTagName('tr');
            
            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                if (cells.length > 1) {
                    let eventName = cells[1].textContent || cells[1].innerText;
                    if (eventName.toUpperCase().indexOf(filter) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>
<body>
    <h2>All Events</h2>

    <input type="text" id="eventSearch" onkeyup="filterEvents()" placeholder="Search for event names..."><br><br>

    <table border="1" id="eventsTable">
        <tr>
            <th>Event No</th>
            <th>Event Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Location</th>
        </tr>

        <?php foreach ($all_events as $event): ?>
            <tr>
                <td><?php echo $event['event_no']; ?></td>
                <td><?php echo $event['event_name']; ?></td>
                <td><?php echo $event['event_description']; ?></td>
                <td><?php echo $event['event_date']; ?></td>
                <td><?php echo $event['event_location']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="user_management.php">Go Back</a></p>

    <?php include('footer.php'); ?>
</body>
</html>
