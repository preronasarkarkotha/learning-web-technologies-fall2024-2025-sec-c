<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];
    
    
    file_put_contents('users.txt', "ID: $id, Password: $password\n", FILE_APPEND);
    echo "Registration successful!";
}
?>


<html lang="en">
<head>
    <title>Registration Form</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend><h1><b>REGISTRATION</b></h1></legend>
            <p>ID:</p>
            <input type="number" name="id" required />

            <p>Password:</p>
            <input type="password" name="password" required />

            <p>Confirm Password:</p>
            <input type="password" name="con_password" required />

            <p>Name:</p>
            <input type="text" name="name" required />

            <p>User Type:</p>
            <input type="radio" name="user_type" value="User" required> User
            <input type="radio" name="user_type" value="Admin" required> Admin
            <br>
            <hr>

            <input type="submit" value="Sign Up" />
            <a href="login.php">Sign In</a>
        </fieldset>
    </form>
</body>
</html>
