<?php

class buyerJobModel extends database
{

    public function getAlljobs($userName)
    {
        $query = "SELECT *,job.userName as buyer FROM job,advertisement WHERE job.userName = '$userName' AND advertisement.advertisementID=job.adId ";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function getPending($userName)
    {
        $query = "SELECT *,job.userName as buyer FROM job,advertisement WHERE job.userName = '$userName' AND advertisement.advertisementID=job.adId AND jobStatus='0'";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function getAccepted($userName)
    {
        $query = "SELECT *,job.userName as buyer FROM job,advertisement WHERE job.userName = '$userName' AND advertisement.advertisementID=job.adId  AND jobStatus='1' ";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
}
