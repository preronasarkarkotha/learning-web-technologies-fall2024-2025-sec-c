<?php
include_once '../controller/customer_controller.php';
?>
<html lang="en">
<head>
    <title>Manage Users</title>
    <script>
        function filterUsers() {
            let input = document.getElementById('userSearch');
            let filter = input.value.toUpperCase();
            let table = document.getElementById('usersTable');
            let rows = table.getElementsByTagName('tr');
            
            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                if (cells.length > 1) {
                    let userName = cells[0].textContent || cells[0].innerText;
                    if (userName.toUpperCase().indexOf(filter) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>
<body>
    <h1>Customer List</h1>

    <input type="text" id="userSearch" onkeyup="filterUsers()" placeholder="Search for customers..."><br><br>

    <table border="1" id="usersTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php include('footer.php'); ?>
