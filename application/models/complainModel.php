<?php
class complainModel extends database
{
    /*GET THE COMPLAIN DATA TO DB*/
    public function insertComplain($complainerUsername,$accusedUsername,$jobId,$description ,$advertisementID,$complainType)
    {
        $sql = "INSERT INTO complain (complainerUsername,accusedUsername,jobId ,description, advertisementID,complainType)
        VALUES ('$complainerUsername' , '$accusedUsername' , '$jobId','$description' ,'$advertisementID' ,'$complainType')";
        $result = mysqli_query($GLOBALS['db'], $sql);
    }
    /* SELECT AD INFO FROM DB*/
    public function selectAdid($userName)
    {
        $sql = "SELECT * FROM job,Advertisement WHERE job.adId = advertisement.AdvertisementID AND job.userName= '$userName'";
        $result = mysqli_query($GLOBALS['db'], $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>