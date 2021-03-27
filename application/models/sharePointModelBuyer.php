<?php
class sharePointModelBuyer extends database{
    public function file($id)
    {
        $sql = "SELECT * FROM files WHERE id=$id";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $file = mysqli_fetch_assoc($result);
        return $file;
    }
    public function fileList()
    {
        $sql = "SELECT * FROM files";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $files;
    }
    

    public function fileUpload($name,$size,$jobid)
    {
        $sql = "INSERT INTO files (name,size,jobid,final,description) VALUES ('$name',$size,$jobid,0,'not-final')";
        return mysqli_query($GLOBALS['db'], $sql);
    }
    public function productUpload($name,$size,$jobid,$descri)
    {
        $sql = "INSERT INTO files (name,size,jobid,final,description) VALUES ('$name',$size,$jobid,1,'$descri')";
        return mysqli_query($GLOBALS['db'], $sql);
    }
    public function updateRate($buyerId,$rate)
    {
        $sql = "SELECT * FROM buyer WHERE userName= '".$buyerId."' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $buyer = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $newReview=$buyer[0]['reviews']+1;
        $newTotalrate=$buyer[0]['totalRate']+$rate;
        $newRate=round($newTotalrate/$newReview);
        $sql = "UPDATE buyer SET buyerRate=".$newRate.",reviews=".$newReview.",totalRate=".$newTotalrate." WHERE userName='".$buyerId."'";
        return mysqli_query($GLOBALS['db'], $sql);
    }
    public function updateRateSeller($sellerId,$comRate,$delRate,$mainRate)
    {
        $sql = "SELECT * FROM seller WHERE userName= '".$sellerId."' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $seller = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $newReview=$seller[0]['totalReviews']+1;
        $newComrate=$seller[0]['totalCommunicationRate']+$comRate;
        $newDelrate=$seller[0]['totalDeliveringRate']+$delRate;
        $newMainrate=$seller[0]['totalMainRate']+$mainRate;
        

        $com=round($newComrate/$newReview);
        $del=round($newDelrate/$newReview);
        $main=round($newMainrate/$newReview);
        $sql = "UPDATE seller SET mainRate=".$main.",communicationRate=".$com.",deliveringRate=".$del." ,mainRate=".$main.",totalReviews=".$newReview.",totalDeliveringRate=".$newDelrate.",totalCommunicationRate=".$newComrate.",totalMainRate=".$newMainrate." WHERE userName='".$sellerId."'";
        return mysqli_query($GLOBALS['db'], $sql);
    }
    public function updateAdRate($buyerId,$jobId,$review,$rate)
    {
        $sql = "SELECT * FROM job WHERE jobId= '".$jobId."' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $job = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $adId=$job[0]['adId'];
        
        $sql = "UPDATE job SET jobStatus='3' WHERE jobId= '".$jobId."'";
        mysqli_query($GLOBALS['db'], $sql);

        $sql = "SELECT * FROM advertisement WHERE 	advertisementID= '".$adId."' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $ad = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $newFeedback=$ad[0]['feedbacks']+1;
        $newRate=$ad[0]['totRate']+$rate;
        $rate=round($newRate/$newFeedback);

        
        $sql = "UPDATE advertisement SET feedbacks=".$newFeedback.",totRate=".$newRate.",rate=".$rate." WHERE advertisementID= '".$adId."'";
        mysqli_query($GLOBALS['db'], $sql);

        $sql = "INSERT INTO ad_reviews(jobId,buyerId,adverticementId,review) VALUES ($jobId,'$buyerId',$adId,'$review')";
        return mysqli_query($GLOBALS['db'], $sql);
    }
    public function isActive($jobId)
    {
        $sql = "SELECT * FROM job WHERE jobId= '".$jobId."' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $job = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $job[0]['jobStatus'];
    }
}
?>