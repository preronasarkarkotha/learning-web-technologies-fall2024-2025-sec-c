<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        .archived {
            color: gray;
            text-decoration: line-through;
        }
        #server-response {
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            margin-bottom: 20px;
            display: none;
        }
    </style>
</head>
<body>

<h1>Notification Portal</h1>


<p id="server-response"></p>

<?php

$notifications = [
    ["id" => 1, "message" => "Your order has been shipped.", "archived" => false],
    ["id" => 2, "message" => "Your payment is due.", "archived" => false],
    ["id" => 3, "message" => "New login from an unknown device.", "archived" => false],
    ["id" => 4, "message" => "Event confirmed by customer.", "archived" => false],
    ["id" => 5, "message" => "Cancelled the Event.", "archived" => false]
];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['archiveId'])) {
        $archiveId = $_POST['archiveId'];
        foreach ($notifications as &$notification) {
            if ($notification['id'] == $archiveId) {
                $notification['archived'] = true;
                echo "<script>document.getElementById('server-response').innerText = 'Notification with ID $archiveId archived successfully.'; document.getElementById('server-response').style.display = 'block'; setTimeout(function() { document.getElementById('server-response').style.display = 'none'; }, 3000);</script>";
                exit; 
            }
        }
    }

    if (isset($_POST['updateId']) && isset($_POST['newMessage'])) {
        $updateId = $_POST['updateId'];
        $newMessage = htmlspecialchars($_POST['newMessage']);
        foreach ($notifications as &$notification) {
            if ($notification['id'] == $updateId) {
                $notification['message'] = $newMessage;
                echo "<script>document.getElementById('server-response').innerText = 'Notification with ID $updateId updated successfully.'; document.getElementById('server-response').style.display = 'block'; setTimeout(function() { document.getElementById('server-response').style.display = 'none'; }, 3000);</script>";
                exit; 
            }
        }
    }

    echo "Invalid request.";
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
        <tr>
            <th>Notification</th>
            <th>Action</th>
        </tr>
        <?php foreach ($notifications as $notification): ?>
            <tr class="<?php echo $notification['archived'] ? 'archived' : ''; ?>">
                <td>
                    <?php if (!$notification['archived']): ?>
                        <input type="text" name="newMessage" value="<?php echo htmlspecialchars($notification['message']); ?>">
                    <?php else: ?>
                        <?php echo htmlspecialchars($notification['message']); ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!$notification['archived']): ?>
                        <button type="button" onclick="archiveNotification(<?php echo $notification['id']; ?>)">Archive</button>
                        <button type="button" onclick="updateNotification(<?php echo $notification['id']; ?>)">Update</button>
                    <?php else: ?>
                        Archived
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>

<script>
   function archiveNotification(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'handle_notifications.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            document.getElementById('server-response').innerText = response.message;
            document.getElementById('server-response').style.display = 'block';
            setTimeout(function () {
                document.getElementById('server-response').style.display = 'none';
            }, 3000); 
            location.reload(); 
        }
    };
    xhttp.send("archiveId=" + id); 
}

function updateNotification(id) {
    const newMessage = document.querySelector(`tr td input[name='newMessage']`).value; 
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'handle_notifications.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            document.getElementById('server-response').innerText = response.message;
            document.getElementById('server-response').style.display = 'block';
            setTimeout(function () {
                document.getElementById('server-response').style.display = 'none';
            }, 3000); 
            location.reload(); 
        }
    };
    xhttp.send("updateId=" + id + "&newMessage=" + encodeURIComponent(newMessage)); 
}

</script>

</body>
</html>
