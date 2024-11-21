<html>
    <body>
        <form action="" value="">
            <fieldset>
                <legend><b>Gender</b></legend>
                <input type ="radio" name="" value=""/>Male
                <input type ="radio" name="" value=""/>Female
                <input type ="radio" name="" value=""/>Male
                <hr>
                <input Type="submit" name="" value="submit"/>
                <?php
                if(isset($_GET['submit']))
                {
                    $email=$_GET['date'];
                    if(empty($date))
                    {
                        echo "Date can't be empty";
                    }
                    else
                    {
                        if($day<1 || $day>31)
                        {
                            echo "Between 1 and 31";

                        }
                        elseif($month<1 || $month>12)
                        {
                            echo "Between 1 and 12";


                        }
                        elseif($year<1953 ||$year>1998)
                        {
                            echo "Between 1953 and 1998";


                        }
                        else
                        {
                            echo "Date is valid";
                        }
                    }
                }
                ?>

            </fieldset>
        </form>
    </body>
</html>