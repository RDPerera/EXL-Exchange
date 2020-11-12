<?php

class sellerDashboardModel extends database
{

    public function retrieveUser($userName)
    {
        $userCheck = "SELECT * FROM user WHERE userName='$userName' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    public function retrieveSeller($userName)
    {
        $userCheck = " SELECT * FROM seller WHERE userName='$userName' LIMIT 1 ";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    public function sellerAds($userName)
    {
    
        $sql = "SELECT * FROM advertisement WHERE userName = '$userName' ";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $i=0;
        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result))
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




}
