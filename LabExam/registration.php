<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $id = trim($_POST['id']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $dob = $_POST['dob'];
    $dept = $_POST['dept'];

    $arr = [];

    if (empty($name)) {
        $arr[] = "Name is required.";
    }

    if (empty($id)) {
        $arr[] = "ID is required.";
    } elseif (!is_numeric($id)) {
        $arr[] = "ID must be a number.";
    }

    if (empty($email)) {
        $arr[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $arr[] = "Invalid email format.";
    }

    if (empty($password)) {
        $arr[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $arr[] = "Password must be at least 6 characters long.";
    }

    if (empty($dob)) {
        $arr[] = "Date of Birth is required.";
    }

    if (empty($dept)) {
        $arr[] = "Department is required.";
    }


    if (!empty($errors)) {
        echo "Errors";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "";
    } else {
        echo "<p'>Registration successful!</p>";
        
}
}
?>

<html lang="en">
<head>
    <title>Registration Form</title>
</head>
<body>
    <h1><b>Registration Form</b></h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend><b>Registration</b></legend>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" value="" placeholder="Type your name" /></td>
                </tr>
                <tr>
                    <td>ID:</td>
                    <td><input type="number" name="id" value="" /></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" value="" /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" value="" /></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="dob" value="" /></td>
                </tr>
                <tr>
                    <td>Dept:</td>
                    <td>
                        <select name="dept">
                            <option value="">CSE</option>
                            <option value="">CS</option>
                            <option value="">SE</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Submit" />
                        <input type="reset" name="reset" value="Reset" />
                    </td>
                </tr>
            </table>
        </fieldset>     
    </form> 
</body>
</html>
