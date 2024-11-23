<html>
    <body>
        <form action="">
            <fieldset>
                <legend><b>EMAIL</b></legend>
                <input type="email" name="email" value=""/>
                <hr>
                <input type="submit" name="submit" value="Submit"/>
                <?php
                if(isset($_GET['submit'])) {
                    $email = $_GET['email'];
                    if(empty($email)) {
                        echo "Email can't be empty";
                    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "Invalid email.";
                    } else {
                        echo "Email is valid.";
                    }
                }
                ?>
            </fieldset>
        </form>
    </body>
</html>
