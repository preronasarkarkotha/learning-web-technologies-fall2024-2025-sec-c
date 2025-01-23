<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['name'])) {
    header('Location: login_view.php');
    exit;
}

$email = $_SESSION['email'];
$name = $_SESSION['name'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['role'])) {
        if ($_POST['role'] == 'Authority') {
            header('Location: adminD_view.php');
            exit;
        } elseif ($_POST['role'] == 'Customer') {
            header('Location: customerD_view.php');
            exit;
        }
    }
}
?>


<html lang="en">
<head>
    <title>Welcome</title>
</head>
<body>
    <form action="dashboard_view.php" method="post">
        <fieldset>
            <legend><h1><b><?php echo htmlspecialchars($name); ?>, Welcome to the Event Management System!</b></h1></legend>
            
            <h3>Are you</h3>
            <h3>
                <Pre><input type="submit" name="role" value="Authority"> <b>OR</b> <input type="submit" name="role" value="Customer"> <b>?</b></Pre>
            </h3>
          
        </fieldset>
    </form>

    
    <hr>
    <?php include('footer.php'); ?>
</body>
</html>
