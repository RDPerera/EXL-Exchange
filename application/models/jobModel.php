
<?php
    class jobModel extends database
    {
        public function sendRequest($adId,$userName,$date,$time,$payAdditional)
        {
            $query = "INSERT INTO job (adId,userName,date,time,additionalPayment,jobStatus)
            VALUES('$adId','$userName','$date','$time','$payAdditional','0')";
            mysqli_query($GLOBALS['db'], $query);
        }
        public function isJob($adId,$userName)
        {
            $query = "SELECT * FROM job WHERE adId='$adId' AND userName='$userName'";
            $result = mysqli_query($GLOBALS['db'], $query);
            $rowcount=mysqli_num_rows($result);
            if ($rowcount>0)
            {
                return true;
            }
            else{
                return false;
            }
        }
        public function getJob($adId,$userName)
        {
            $query = "SELECT * FROM job WHERE adId='$adId' AND userName='$userName'";
            $result = mysqli_query($GLOBALS['db'], $query);
            return mysqli_fetch_assoc($result);
        }
    }
?>