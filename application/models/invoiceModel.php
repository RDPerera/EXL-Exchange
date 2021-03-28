<?php
class invoiceModel extends database{
    public function getAll($jobId)
    {
        $sql = "SELECT * FROM job,advertisement,user WHERE job.jobId=$jobId AND advertisement.advertisementID=job.adId AND advertisement.userName=user.userName LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $file = mysqli_fetch_assoc($result);
        return $file;
    }
}
?>