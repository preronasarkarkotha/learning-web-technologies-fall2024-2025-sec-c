<html>
    <body>
        <form action="" value="">
            <fieldset>
                <legend><b>NAME</b></legend>
                <input type ="text" name="" value=""/>
                <hr>
                <input Type="submit" name="" value="submit"/>
                <?php
                if(isset($_GET['submit']))
                {
                    $name=$_GET['name'];
                    if(empty($name))
                    {
                        echo "Name can't be empty";
                    }
                    elseif($name[0]<'A' || $name[0]>'z' || ($name[0]>'Z' && $name[0]<'a'))
                    {
                        echo "Name must start with a letter.";
                    }
                    else
                    {
                        echo "Name is valid.";
                    }
                }
                ?>

            </fieldset>
        </form>
    </body>
</html>