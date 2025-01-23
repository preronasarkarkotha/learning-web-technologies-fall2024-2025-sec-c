<?php
session_start();


$host = 'localhost';
$db = 'registration_db';
$user = 'root';
$password = '';

$mysqli = new mysqli($host, $user, $password, $db);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $gender = $_POST['gender'];
    $phone = trim($_POST['phone']);

    if (empty($name)) { $errors[] = "Name is required."; }
    if (empty($password) || strlen($password) < 6) { $errors[] = "Password must be at least 6 characters long."; }
    if (empty($gender)) { $errors[] = "Gender is required."; }

    if (empty($errors)) {
        
        $stmt = $mysqli->prepare("INSERT INTO users (name, email, password, gender, phone) VALUES (?, ?, ?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("sssss", $name, $email, $hashed_password, $gender, $phone);
        
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Registration successful!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $mysqli->error . "</p>";
        }

        $stmt->close();
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script>
        function validateRegistrationForm() {
            const name = document.forms["registrationForm"]["name"].value.trim();
            const email = document.forms["registrationForm"]["email"].value.trim();
            const password = document.forms["registrationForm"]["password"].value;
            const gender = document.forms["registrationForm"]["gender"].value;
            const phone = document.forms["registrationForm"]["phone"].value.trim();

            let errors = [];

            if (name === "") errors.push("Name is required.");
            if (!email.match(/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/)) errors.push("Invalid email format.");
            if (password.length < 6) errors.push("Password must be at least 6 characters long.");
            if (gender === "") errors.push("Gender is required.");
            if (!phone.match(/^\d{10}$/)) errors.push("Phone number must be 10 digits.");

            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<h1>Register</h1>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form name="registrationForm" method="post" action="" onsubmit="return validateRegistrationForm()">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>
    <label>Email:</label>
    <input type="email" name="email" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <label>Gender:</label>
    <select name="gender" required>
        <option value="">Select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select><br><br>
    <label>Phone:</label>
    <input type="text" name="phone" required><br><br>
    <button type="submit">Register</button>
</form>

</body>
</html>
