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
    <title>Add New User</title>
    <script>
        function validateInput() {
            let name = document.getElementById('name');
            let nameValue = name.value.trim();
            let email = document.getElementById('email');
            let emailValue = email.value.trim();
            let role = document.getElementById('role');
            let roleValue = role.value.trim();
            
            let nameMsg = document.getElementById('nameMsg');
            let emailMsg = document.getElementById('emailMsg');
            let roleMsg = document.getElementById('roleMsg');
            nameMsg.innerHTML = "";
            emailMsg.innerHTML = "";
            roleMsg.innerHTML = "";
            let isValid = true;
            
            if (nameValue === '') {
                nameMsg.innerHTML = "Name is required.";
                nameMsg.style.color = 'red';
                isValid = false;
            }

            if (emailValue === '') {
                emailMsg.innerHTML = "Email is required.";
                emailMsg.style.color = 'red';
                isValid = false;
            } else {
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!emailPattern.test(emailValue)) {
                    emailMsg.innerHTML = "Please enter a valid email address.";
                    emailMsg.style.color = 'red';
                    isValid = false;
                }
            }

            if (roleValue === '') {
                roleMsg.innerHTML = "Role is required.";
                roleMsg.style.color = 'red';
                isValid = false;
            }
            return isValid;
        }
    </script>
</head>
<body>
    <h1>Add New User</h1>
    <form action="../controller/add_user_controller.php" method="post" onsubmit="return validateInput()">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" onblur="validateInput()"><br>
        <p id="nameMsg"></p><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" onblur="validateInput()" required><br>
        <p id="emailMsg"></p><br>

        <label for="role">Role:</label><br>
        <input type="text" id="role" name="role" onblur="validateInput()" required><br>
        <p id="roleMsg"></p><br>

        <input type="submit" value="Add User">
    </form>

    <br>
    <hr>
    <?php
    if (isset($_SESSION['user_message'])) {
        echo "<p>" . $_SESSION['user_message'] . "</p>";
        unset($_SESSION['user_message']);
    }
    ?>

    <p><a href="user_management.php">Back to User Management</a></p>
    <?php include('footer.php'); ?>
</body>
</html>
