
<?php
    class jobResponceModel extends database
    {
        
        public function getAdDetails($adid)
        {
            $userDetails = "SELECT * FROM advertisement WHERE advertisementID ='$adid' LIMIT 1";
            $result = mysqli_query($GLOBALS['db'], $userDetails);
            return mysqli_fetch_assoc($result);
        }
        public function getJob($adId,$userName)
        {
            $query = "SELECT * FROM job WHERE adId='$adId' AND userName='$userName' LIMIT 1";
            $result = mysqli_query($GLOBALS['db'], $query);
            return mysqli_fetch_assoc($result);
        }
        public function accept($userName,$jobId)
        {
            $query = "UPDATE job SET jobStatus='1' WHERE jobID='$jobId' AND userName='$userName'";
            mysqli_query($GLOBALS['db'], $query);
        }
        public function reject($userName,$jobId)
        {
            $query = "UPDATE job SET jobStatus='2' WHERE jobID='$jobId' AND userName='$userName'";
            mysqli_query($GLOBALS['db'], $query);
        }
    }
?>