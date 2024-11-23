<html>
    <body>
        <form action="">
            <fieldset>
                <legend><b>GENDER</b></legend>
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female
                <input type="radio" name="gender" value="other"> Other
                
                <hr>
                <input type="submit" name="submit" value="Submit"/>

                <?php
                if(isset($_GET['submit'])) {
                    if(!isset($_GET['gender'])) {
                        echo "Please select at least one gender option.";
                    } else {
                        $gender = $_GET['gender'];
                        echo "Selected Gender: " . $gender;
                    }
                }
                ?>
            </fieldset>
        </form>
    </body>
</html>
