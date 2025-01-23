<?php
include 'header.php';
?>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Add Post</h2>
            <div class="alert__message error">
                <p>Invalid credentials. Please try again.</p>
            </div>
            <form action="" enctype="multipart/form-data">
               
                <input type="text" placeholder="Title">
                <select>
                    <option value="1">Travel</option>
                    <option value="1">Art</option>
                    <option value="1">Food</option>
                    <option value="1">Travel</option>
                    <option value="1">Travel</option>
                    <option value="1">Travel</option>
                    <option value="1">Travel</option>
                    <option value="1">Travel</option>
                </select>
                <div class="form__control">
                    <input type="checkbox" id="is_featured">
                    <label for="is_featured" checked>Featured</label>
                </div>
   
                <div class="form__control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" id="thumbnail">
                </div>
   
                <button type="submit" class="btn">Add Post</button>
               
            </form>
        </div>
    </section>
   
    <?php
include '../partials/footer.php';
?>