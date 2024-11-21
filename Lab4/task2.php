<html>
    <body>
        <form action="" value="">
            <fieldset>
                <legend><b>EMAIL</b></legend>
                <input type ="email" name="" value=""/>
                <hr>
                <input Type="submit" name="" value="submit"/>
                <?php
                if(isset($_GET['submit']))
                {
                    $email=$_GET['email'];
                    if(empty($email))
                    {
                        echo "Email can't be empty";
                    }
                    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
                    {
                        echo "Invalid.";
                    }
                    else
                    {
                        echo "Email is valid.";
                    }
                }
                ?>

            </fieldset>
        </form>
    </body>
</html>