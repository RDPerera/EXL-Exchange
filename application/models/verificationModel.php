<?php
class verificationModel extends database
{
    /* check user is valid or not */
    public function userCheck($userName,$email)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM user WHERE userName='$userName' OR email='$email' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }
    public function updateOTP($userName,$otp)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $otp=mysqli_real_escape_string($GLOBALS['db'],$otp);
        $query = "UPDATE user SET verificationOTP='$otp' WHERE userName = '$userName' ";
        return mysqli_query($GLOBALS['db'], $query);
    }
    public function updateVerification($userName)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $query = "UPDATE user SET verificationStatus=1 WHERE userName = '$userName' ";
        return mysqli_query($GLOBALS['db'], $query);
    }
}
?>