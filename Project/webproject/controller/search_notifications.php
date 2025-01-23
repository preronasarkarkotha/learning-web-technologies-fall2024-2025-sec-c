<?php
// Get the search query from the POST request
if (isset($_POST['searchQuery'])) {
    $searchQuery = strtolower($_POST['searchQuery']);
    
    // Sample notifications (in practice, fetch these from the database)
    $notifications = [
        ["id" => 1, "message" => "Your order has been shipped.", "archived" => false],
        ["id" => 2, "message" => "Your payment is due.", "archived" => false],
        ["id" => 3, "message" => "New login from an unknown device.", "archived" => false],
        ["id" => 4, "message" => "Event confirmed by customer.", "archived" => false],
        ["id" => 5, "message" => "Cancelled the Event.", "archived" => false]
    ];

    // Filter notifications based on the search query
    $filteredNotifications = [];
    foreach ($notifications as $notification) {
        if (strpos(strtolower($notification['message']), $searchQuery) !== false) {
            $filteredNotifications[] = $notification;
        }
    }
    
    // Output the filtered results (JSON response can be sent if required)
    echo json_encode($filteredNotifications);
}
?>
