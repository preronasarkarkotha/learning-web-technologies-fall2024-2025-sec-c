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
    <title>Reports</title>
</head>
<body>
        <fieldset>
            <legend><h1><b>Reports</b></h1></legend>
            
            <ul>
            <li><a href="gr_view.php">Genarate Reports</a></li>
            <li><a href="list_view.php">Reports List</a></li>
            <ul>
            <br><br>
        </fieldset>
    <hr>
  
</body>
</html>
<?php include('footer.php'); ?>
