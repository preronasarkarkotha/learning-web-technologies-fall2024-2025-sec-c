<html lang="en">
<head>
    <title>Role Management</title>
</head>
<body>
    <div id="role-management">
        <h2><b>Role Management</b></h2>

        <form action="update_role.php" method="post">
            <fieldset>
                <legend><b>Assign Role</b></legend>

                <h3>User:</h3>
                <select name="user_id" required>
                    <option value="1">Organizer 1</option>
                    <option value="2">Organizer 2</option>
                    <option value="3">Customer 1</option>
                    <option value="4">Customer 2</option>
                </select><br><br>

                <h3>Assign Role:</h3>
                <select name="role" required>
                    <option value="admin">Admin</option>
                    <option value="organizer">Organizer</option>
                    <option value="customer">Customer</option>
                </select><br><br>

                <input type="submit" value="Assign Role">
            </fieldset>
        </form>

        <hr>

        <h3>Current Roles:</h3>
        <table border="1">
            <tr>
                <th>User</th>
                <th>Current Role</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>Organizer 1</td>
                <td>Organizer</td>
                <td>
                    <a href="edit_role.php?id=1">Edit</a>
                </td>
            </tr>

            <tr>
                <td>Organizer 2</td>
                <td>Organizer</td>
                <td>
                    <a href="edit_role.php?id=2">Edit</a>
                </td>
            </tr>

            <tr>
                <td>Customer 1</td>
                <td>Customer</td>
                <td>
                    <a href="edit_role.php?id=3">Edit</a>
                </td>
            </tr>

            <tr>
                <td>Customer 2</td>
                <td>Customer</td>
                <td>
                    <a href="edit_role.php?id=4">Edit</a>
                </td>
            </tr>
        </table>
    </div>
    <a href="dashboard.php">Previous</a>
</body>
</html>
