<?php 
include 'header.php';
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Event</h2>

        <form id="addEventForm" enctype="multipart/form-data" method="POST" action="eventedit.php">
            <div class="form__control">
                <label for="picture">Add Thumbnail</label>
                <input type="file" name="picture" id="picture" required>
            </div>
            <input type="text" name="title" id="title" placeholder="Title" required>
            <input type="text" name="event_name" id="event_name" placeholder="Event Name" required>
            <textarea name="details" id="details" rows="10" placeholder="Details" required></textarea>
            <button type="submit" class="btn">Add Event</button>
        </form>
    </div>
</section>

<script src="../js/eventscript.js"></script> <!-- Include JS for form validation -->

<?php 
include '../partials/footer.php';
?>
