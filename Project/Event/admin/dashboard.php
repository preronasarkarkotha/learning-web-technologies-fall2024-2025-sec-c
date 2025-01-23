<?php 
include 'header.php'; 
require 'database.php'; // Include database constants


$sql = "SELECT id, title, category_id FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

?>

<section class="dashboard">
    <div class="container dashboard__container">
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="fas fa-edit"></i>
                        <h7>Add Gallery</h7>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php" class="active"><i class="fas fa-tasks"></i>
                        <h7>Manage Gallery</h7>
                    </a>
                </li>
                <li>
                    <a href="add-user.php"><i class="fas fa-user-plus"></i>
                        <h7>Add user</h7>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php" ><i class="fas fa-users"></i>
                        <h7>Manage User</h7>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><i class="fas fa-folder-plus"></i>
                        <h7>Add Event</h7>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php" ><i class="fas fa-folder"></i>
                        <h7>Manage Event</h7>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage Gallery</h2>
            <table>
                <thead>
                    <tr>
                        <th><h7>Title</h7></th>
                        <th><h7>Category</h7></th>
                        <th><h7>Edit</h7></th>
                        <th><h7>Delete</h7></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td><h7>' . htmlspecialchars($row['title']) . '</h7></td>';
                            echo '<td><h7>' . htmlspecialchars($row['category_id']) . '</h7></td>';
                            echo '<td><a href="edit-post.php?id=' . $row['id'] . '" class="btn sm">Edit</a></td>';
                            echo '<td><a href="delete.php?id=' . $row['id'] . '" class="btn sm danger">Delete</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4"><h7>No gallery items available.</h7></td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php 
include '../partials/footer.php'; 
?>
<?php
// Close the database connection
$conn->close();
?>
