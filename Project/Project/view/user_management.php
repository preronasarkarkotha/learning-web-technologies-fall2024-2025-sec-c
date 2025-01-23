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
    <title>User Management</title>
</head>
<body>
    <form action="usermanagement.php" method="post">
        <fieldset>
            <legend><h1><b>User Management</b></h1></legend>
            <p><a href="add_user_view.php">Add New User</a></p>

            <h3>Manage:</h3>
            <ul>
                <li><a href="organizer_view.php">Organizer List</a></li>
                <li><a href="customer_view.php">Customer List</a></li>
                
            
            </ul>

            <br><br>
                
           

            <a href="dashboard_view.php">Previous</a>
            

        </fieldset>
    </form>
    <hr>
    <?php include('footer.php'); ?>
</body>
</html>
