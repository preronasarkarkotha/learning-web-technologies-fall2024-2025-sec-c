<?php
include_once '../controller/list_controller.php';
?>
<html lang="en">
<head>
    <title>Manage Reports</title>
    <script>
        function filterReports() {
            let input = document.getElementById('reportSearch');
            let filter = input.value.toUpperCase();
            let table = document.getElementById('reportsTable');
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
    <h1>Report List</h1>

    <input type="text" id="reportSearch" onkeyup="filterReports()" placeholder="Search for events..."><br><br>

    <table border="1" id="reportsTable">
        <thead>
            <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Event Description</th>
                <th>Event Date</th>
                <th>Event Location</th>
                <th>Organizer Name</th>
                <th>Participants</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
                <tr>
                    <td><?php echo $report['event_id']; ?></td>
                    <td><?php echo $report['event_name']; ?></td>
                    <td><?php echo $report['event_description']; ?></td>
                    <td><?php echo $report['event_date']; ?></td>
                    <td><?php echo $report['event_location']; ?></td>
                    <td><?php echo $report['organizer_name']; ?></td>
                    <td><?php echo $report['participants']; ?></td>
                    <td><?php echo $report['status']; ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php include('footer.php'); ?>
