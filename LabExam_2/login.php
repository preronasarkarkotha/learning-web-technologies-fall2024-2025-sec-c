<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_id = $_POST['id'];
    $input_password = $_POST['password'];
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    $login_successful = false;
    foreach ($users as $user) {
        list($stored_id, $stored_password) = explode(", ", $user);
        $stored_id = str_replace('ID: ', '', $stored_id);
        $stored_password = str_replace('Password: ', '', $stored_password);
        if ($input_id == $stored_id && $input_password == $stored_password) {
            $login_successful = true;
            break;
        }
    }
    if ($login_successful) {
        echo "Login successful!";
    } else {
        echo "Invalid login credentials!";
    }
}
?>


<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <fieldset>
            <legend><h1><b>LOGIN</b></h1></legend>
            <p>UserId:</p>
            <input type="number" name="id" value="" required />

            <p>Password:</p>
            <input type="password" name="password" value="" required />
            <hr>

            <input type="submit" value="Login" /> 
            <a href="registration.php">Register</a>
        </fieldset>
    </form>
</body>
</html>
