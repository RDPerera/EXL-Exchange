<?php
class loginModel extends database
{
    /* Delete User from DB */
    public function deleteUser($userName)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userDelete = "DELETE FROM user WHERE userName='$userName'";
        $result = mysqli_query($GLOBALS['db'], $userDelete);
        $userDelete = "DELETE FROM buyer WHERE userName='$userName'";
        $result = mysqli_query($GLOBALS['db'], $userDelete);
        $userDelete = "DELETE FROM seller WHERE userName='$userName'";
        $result = mysqli_query($GLOBALS['db'], $userDelete);
    }
    
    /* check user is valid or not */
    public function userNameCheck($userName)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM user WHERE userName='$userName' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }

    /* check user is a buyer or not */
    public function buyerCheck($userName)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM buyer WHERE userName='$userName' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }

    /* check user is a seller or not */
    public function sellerCheck($userName)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM seller WHERE userName='$userName' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }

    /* check account sataus */
    public function accountCheck($userName)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM user WHERE userName='$userName' and verificationStatus='1' and accountStatus='0' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }

    /* check username and password are matched */
    public function passwordCheck($userName,$password)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $password=mysqli_real_escape_string($GLOBALS['db'],$password);
        $userCheck = "SELECT * FROM user WHERE userName='$userName' and password='$password' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }
}