<?php

class sellerDashboardModel extends database
{

    public function retrieveUser($userName) //retrieves the user table data from the database and returns it
    {
        $userCheck = "SELECT * FROM user WHERE userName='$userName' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    public function retrieveSeller($userName) //retrieves the seller table data from the database and returns it
    {
        $userCheck = " SELECT * FROM seller WHERE userName='$userName' LIMIT 1 ";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    public function sellerAds($userName) //retrieves the user advertisement data from the database and returns it
    {

        $sql = "SELECT * FROM advertisement WHERE userName = '$userName' ";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $i = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) //putting the received ad data to an 2D array so that we can send it to the controller
            {
                $dataToSend[$i][0] =  $row['advertisementID'];
                $dataToSend[$i][1] =  $row['image'];
                $dataToSend[$i][2] =  $row['title'];
                $dataToSend[$i][3] =  $row['category'];
                $dataToSend[$i][4] =  $row['feedbacks'];
                $dataToSend[$i][5] =  $row['rate'];
                $dataToSend[$i][6] =  $row['content'];
                $dataToSend[$i][7] =  $row['price'];

                $i++;
            }
            return $dataToSend;
        }
    }

    public function checkOlderDP($userName)
    {
        $query = "SELECT profilePicture FROM user WHERE userName = '$userName' ";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function getjobs($userName)
    {
        $query = "SELECT *,job.userName as buyer FROM job,advertisement WHERE advertisement.userName = '$userName' AND advertisement.advertisementID=job.adId LIMIT 10";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function getPendingjobs($userName)
    {
        $query = "SELECT *,job.userName as buyer FROM job,advertisement WHERE advertisement.userName = '$userName' AND advertisement.advertisementID=job.adId AND jobStatus='0'";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function getActivejobs($userName)
    {
        $query = "SELECT *,job.userName as buyer FROM job,advertisement WHERE advertisement.userName = '$userName' AND advertisement.advertisementID=job.adId AND jobStatus='1'";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function getAlljobs($userName)
    {
        $query = "SELECT *,job.userName as buyer FROM job,advertisement WHERE advertisement.userName = '$userName' AND advertisement.advertisementID=job.adId ";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function setOffline($userName)
    {
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s');
        $query = "UPDATE user_online SET status='0',date_time='$date' WHERE userName = '$userName' ";
        mysqli_query($GLOBALS['db'], $query);
    }
    public function updateNewDP($image, $userName)
    {
        $query = "UPDATE user SET profilePicture='$image' WHERE userName = '$userName' ";
        return mysqli_query($GLOBALS['db'], $query);
    }
    public function deleteDP($userName)
    {
        $query = "UPDATE user SET profilePicture=null WHERE userName = '$userName' ";
        return mysqli_query($GLOBALS['db'], $query);
    }
    public function retrieveAd($adID){
        $query = "SELECT * FROM advertisement WHERE advertisementID='$adID' ";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}
