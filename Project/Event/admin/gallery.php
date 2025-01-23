<?php 
include 'header.php'; 

require 'database.php'; // Include the constants file

// Database connection

// Fetch posts from the database
$sql = "SELECT title, body, thumbnail, category_id FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

?>
<section class="search__bar">
    <form class="container search__bar-container" id="searchForm" method="GET" action="searchValidation.php">
        <div>
            <i class="fas fa-search"></i>
            <input type="search" id="query" name="query" placeholder="Search" required>
        </div>
        <button type="submit" class="btn">GO</button>
    </form>
</section>

<div class="container posts__container">
    <?php
    if ($result && $result->num_rows > 0) {
        while ($post = $result->fetch_assoc()) {
            echo '<article class="posts">';
            echo '<div class="post__thumbnail">';
            echo '<img src="images/' . htmlspecialchars($post['thumbnail'] ?? 'default_thumbnail.jpg') . '" alt="' . htmlspecialchars($post['title'] ?? 'No Title') . '">';
            echo '</div>';
            echo '<div class="post__info">';
            echo '<a href="" class="category__button">' . htmlspecialchars($post['category_id'] ?? 'Uncategorized') . '</a>';
            echo '<h3 class="post__title">';
            echo '<a href="posts.php">' . htmlspecialchars($post['title'] ?? 'No Title') . '</a>';
            echo '</h3>';
            echo '</div>';
            echo '</article>';
        }
    } else {
        echo '<p>No posts available or added yet.</p>';
    }
    ?>
</div>

<script src="searchValidation.js"></script>
<?php include '../partials/footer.php'; ?>

<?php
// Close the database connection
$conn->close();
?>
