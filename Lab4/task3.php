<html>
    <body>
        <form action="">
            <fieldset>
                <legend><b>DATE OF BIRTH</b></legend>
                <input type="date" name="date" value=""/>
                <hr>
                <input type="submit" name="submit" value="submit"/>
                <?php
                if(isset($_GET['submit'])) {
                    $date = $_GET['date'];
                    if(empty($date)) {
                        echo "Date can't be empty";
                    } else {
                        $dateArray = explode("-", $date);
                        $year = (int)$dateArray[0];
                        $month = (int)$dateArray[1];
                        $day = (int)$dateArray[2];

                        // date
                        if($day < 1 || $day > 31) {
                            echo "Day must be between 1 and 31.";
                        } elseif($month < 1 || $month > 12) {
                            echo "Month must be between 1 and 12.";
                        } elseif($year < 1953 || $year > 1998) {
                            echo "Year must be between 1953 and 1998.";
                        } else {
                            echo "Date is valid.";
                        }
                    }
                }
                ?>
            </fieldset>
        </form>
    </body>
</html>
