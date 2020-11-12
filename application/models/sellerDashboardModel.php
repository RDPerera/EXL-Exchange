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



}
