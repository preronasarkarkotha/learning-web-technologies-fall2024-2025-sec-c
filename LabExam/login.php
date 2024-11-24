<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login Page</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if (empty($username) || empty($password)) {
            echo "Username and Password cannot be empty!";
        } else {
            echo "Login successful!";
        }
    }
    ?>
    <form method="post" action="">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" required name="username" value="" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" value="" /></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
