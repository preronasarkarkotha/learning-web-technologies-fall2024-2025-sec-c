<?php
session_start();


if (!isset($_SESSION['email']) || !isset($_SESSION['name'])) {
 
    header('Location: login_view.php');
    exit;
}

$email = $_SESSION['email']; 
$name = $_SESSION['name'];   
?><html lang="en">
<head>
    <title>Welcome</title>
</head>
<body>
   
        <fieldset>
            <legend><h1><b>Welcome to the Event Management System!</b></h1></legend>
            
            <p>As an Admin, you have full access to manage events, users, roles, and generate reports.</p>

            <h3>Quick Links:</h3>
            <p><a href="events_view.php">Event List</a></p>
        
            <p>If you need help, feel free to contact <a href="mailto:eventmanagament@gmail.com">eventmanagament@gmail.com</a>.</p>
            <p><a href="dashboard_view.php">Go Back</a></p>
          
        </fieldset>
    

  
    <hr>
    <?php include('footer.php'); ?>
</body>
</html>
