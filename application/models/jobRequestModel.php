
<?php
    class jobRequestModel extends database
    {
        public function sendRequest($adId,$userName,$date,$time,$payAdditional)
        {
            $query = "INSERT INTO job (adId,userName,date,time,additionalPayment)
            VALUES('$adId','$userName','$date','$time','$payAdditional')";
            mysqli_query($GLOBALS['db'], $query);
        }
        
    }
?>