<html lang="en">
<head>
    <title>Event Report</title>
    <script>
        function validateInput() {
            let eventId = document.getElementById('event_id');
            let eventIdValue = eventId.value.trim();
            let eventName = document.getElementById('event_name');
            let eventNameValue = eventName.value.trim();
            let eventDescription = document.getElementById('event_description');
            let eventDescriptionValue = eventDescription.value.trim();
            let eventDate = document.getElementById('event_date');
            let eventDateValue = eventDate.value.trim();
            let eventLocation = document.getElementById('event_location');
            let eventLocationValue = eventLocation.value.trim();
            let organizerName = document.getElementById('organizer_name');
            let organizerNameValue = organizerName.value.trim();
            let participants = document.getElementById('participants');
            let participantsValue = participants.value.trim();
            let status = document.getElementById('status');
            let statusValue = status.value.trim();
            document.getElementById('event_id_msg').innerText = "";
            document.getElementById('event_name_msg').innerText = "";
            document.getElementById('event_description_msg').innerText = "";
            document.getElementById('event_date_msg').innerText = "";
            document.getElementById('event_location_msg').innerText = "";
            document.getElementById('organizer_name_msg').innerText = "";
            document.getElementById('participants_msg').innerText = "";
            document.getElementById('status_msg').innerText = "";

            let valid = true;
            if (eventIdValue === '') {
                document.getElementById('event_id_msg').innerText = "Event ID is required.";
                valid = false;
            }
            if (eventNameValue === '') {
                document.getElementById('event_name_msg').innerText = "Event Name is required.";
                valid = false;
            }
            if (eventDescriptionValue === '') {
                document.getElementById('event_description_msg').innerText = "Event Description is required.";
                valid = false;
            }
            if (eventDateValue === '') {
                document.getElementById('event_date_msg').innerText = "Event Date is required.";
                valid = false;
            }
            if (eventLocationValue === '') {
                document.getElementById('event_location_msg').innerText = "Event Location is required.";
                valid = false;
            }
            
            if (organizerNameValue === '') {
                document.getElementById('organizer_name_msg').innerText = "Organizer Name is required.";
                valid = false;
            }
            if (participantsValue === '') {
                document.getElementById('participants_msg').innerText = "Participants are required.";
                valid = false;
            } else if (isNaN(participantsValue)) {
                document.getElementById('participants_msg').innerText = "Participants must be a number.";
                valid = false;
            }
            if (statusValue === '') {
                document.getElementById('status_msg').innerText = "Status is required.";
                valid = false;
            }

            return valid;
        }
    </script>
</head>
<body>

    <h1>Event Report</h1>

    <?php
    session_start();
    if (isset($_SESSION['user_message'])) {
        echo "<p><b>" . $_SESSION['user_message'] . "</b></p>";
        unset($_SESSION['user_message']);
    }
    ?>

    <form action="../controller/gr_controller.php" method="POST" onsubmit="return validateInput()">
        <fieldset>
            <legend><b>Event Information</b></legend>

            <label for="event_id">Event ID:</label>
            <input type="number" id="event_id" name="event_id" onblur="validateInput()" required><br>
            <span id="event_id_msg" style="color: red;"></span><br><br>

            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" onblur="validateInput()" required><br>
            <span id="event_name_msg" style="color: red;"></span><br><br>

            <label for="event_description">Event Description:</label>
            <textarea id="event_description" name="event_description" onblur="validateInput()" required></textarea><br>
            <span id="event_description_msg" style="color: red;"></span><br><br>

            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" onblur="validateInput()" required><br>
            <span id="event_date_msg" style="color: red;"></span><br><br>

            <label for="event_location">Event Location:</label>
            <input type="text" id="event_location" name="event_location" onblur="validateInput()" required><br>
            <span id="event_location_msg" style="color: red;"></span><br><br>

            <label for="organizer_name">Organizer Name:</label>
            <input type="text" id="organizer_name" name="organizer_name" onblur="validateInput()" required><br>
            <span id="organizer_name_msg" style="color: red;"></span><br><br>

            <label for="participants">Participants:</label>
            <input type="number" id="participants" name="participants" onblur="validateInput()" required><br>
            <span id="participants_msg" style="color: red;"></span><br><br>

            <label for="status">Status:</label>
            <input type="text" id="status" name="status" onblur="validateInput()" required><br>
            <span id="status_msg" style="color: red;"></span><br><br>

            <input type="submit" value="Generate Report"><br><br>

            <p><a href="report.php">Go Back</a></p>

        </fieldset>
    </form>

</body>
</html>

<?php include('footer.php'); ?>
