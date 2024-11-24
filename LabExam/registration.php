
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
