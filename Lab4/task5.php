<html>
    <body>
        <form action="">
            <fieldset>
                <legend><b>DEGREE</b></legend>
                <input type="checkbox" name="degree[]" value="SSC"> SSC
                <input type="checkbox" name="degree[]" value="HSC"> HSC
                <input type="checkbox" name="degree[]" value="BSc"> BSc
                <input type="checkbox" name="degree[]" value="MSc"> MSc
                
                <hr>
                <input type="submit" name="submit" value="Submit"/>

                <?php
                if(isset($_GET['submit'])) {
                    if(!isset($_GET['degree']) || count($_GET['degree']) < 2) {
                        echo "Please select at least two degree options.";
                    } else {
                        $selectedDegrees = implode(", ", $_GET['degree']);
                        echo "You have selected the following degrees: " . $selectedDegrees;
                    }
                }
                ?>
            </fieldset>
        </form>
    </body>
</html>
