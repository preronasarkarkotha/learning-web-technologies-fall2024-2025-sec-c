<?php

$notifications = [
    ["id" => 1, "message" => "Your order has been shipped.", "archived" => false],
    ["id" => 2, "message" => "Your payment is due.", "archived" => false],
    ["id" => 3, "message" => "New login from an unknown device.", "archived" => false],
    ["id" => 4, "message" => "Event confirmed by customer.", "archived" => false],
    ["id" => 5, "message" => "Cancelled the Event.", "archived" => false],
];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['archiveId'])) {
        $archiveId = $_POST['archiveId'];
        foreach ($notifications as &$notification) {
            if ($notification['id'] == $archiveId) {
                $notification['archived'] = true;
                
                echo json_encode(['status' => 'success', 'message' => "Notification with ID $archiveId archived successfully."]);
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
                
                echo json_encode(['status' => 'success', 'message' => "Notification with ID $updateId updated successfully."]);
                exit; 
            }
        }
    }

   
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
