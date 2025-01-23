<?php 
    include 'header.php';
?>


<section class="form__section">
        <div class="container form__section-container">
            <h2>Add Post</h2>
            <!-- Error message -->
            <div id="errorMessage" style="display: none; color: red;">Invalid credentials. Please try again.</div>
            
            <!-- Form -->
            <form id="addPostForm" enctype="multipart/form-data" method="POST" action="submitPost.php">
                <input type="text" name="title" placeholder="Title">
                <select name="category">
        <option value="">Select a category</option> <!-- Add a default placeholder -->
        <option value="1">Social</option>
        <option value="2">Art</option>
        <option value="3">Food</option>
        <option value="4">Photography</option>
        <option value="5">Exhibition</option>
        <option value="6">Event</option>
        <option value="7">Party</option>
        <option value="8">Wedding</option>
    </select>
                <textarea name="body" rows="10" placeholder="Body"></textarea>
                <div class="form__control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" class="btn">Add Post</button>
            </form>
        </div>
    </section>
    <!-- Include the validation script -->
    <script src="../js/validatePost.js"></script>
    

<?php 
    include '../partials/footer.php';
?>