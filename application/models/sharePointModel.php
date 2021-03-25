<?php
class sharePointModel extends database{
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
}
?>