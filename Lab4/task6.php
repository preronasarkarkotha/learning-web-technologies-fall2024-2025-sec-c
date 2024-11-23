<html>
    <body>
        <form action="">
            <fieldset>
                <legend><b>BLOOD GROUP</b></legend>
                <select name="blood_group">
                    <option value=""></option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select><br><br>
                
                <hr>
                <input type="submit" name="submit" value="Submit"/>

                <?php
                if(isset($_GET['submit'])) {
                    if(empty($_GET['blood_group'])) {
                        echo "Please select a blood group.";
                    } else {
                        $bloodGroup = $_GET['blood_group'];
                        echo "You selected: " . $bloodGroup;
                    }
                }
                ?>
            </fieldset>
        </form>
    </body>
</html>
