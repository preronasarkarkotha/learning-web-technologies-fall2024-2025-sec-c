<?php
include 'control_login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        function validateLoginForm() {
            const email = document.forms["loginForm"]["email"].value.trim();
            const password = document.forms["loginForm"]["password"].value;

            let errors = [];

            if (!email.match(/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/)) errors.push("Invalid email format.");
            if (password === "") errors.push("Password is required.");

            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<h1>Login</h1>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form name="loginForm" method="post" action="" onsubmit="return validateLoginForm()">
    <label>Email:</label>
    <input type="email" name="email" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
