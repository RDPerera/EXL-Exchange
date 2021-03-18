<?php
class forgetPasswordModel extends database
{
    /* check whether user is exits */
    public function userCheck($email)
    {
        $userCheck = "SELECT * FROM user WHERE email='$email' LIMIT 1";
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
    /* Update user password */
    public function updatePassword($userName,$password)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $password=mysqli_real_escape_string($GLOBALS['db'],$password);
        $update = "UPDATE user SET password ='$password' WHERE userName='$userName' ";
        $result = mysqli_query($GLOBALS['db'], $update);
        return $result;
    }

}