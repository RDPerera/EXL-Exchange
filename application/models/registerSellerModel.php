<?php
class registerSellerModel extends database
{
    /* check user is valid or not */
    public function userNameCheck($userName)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM user WHERE userName='$userName'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }
    public function emailCheck($email)
    {
        $email=mysqli_real_escape_string($GLOBALS['db'],$email);
        $userCheck = "SELECT * FROM user WHERE email='$email' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }
    public function addSeller($userName,$firstName,$lastName,$dob,$email,$password)
    {
        $query = "INSERT INTO user (userName,firstName,lastName,dob,email,accountStatus,verificationStatus,verificationOTP,password) 
        VALUES('$userName', '$firstName', '$lastName','$dob','$email',0,0,0,'$password')";
        mysqli_query($GLOBALS['db'], $query);
        $query = "INSERT INTO seller(userName,mainRate,communicationRate,deliveringRate)
        VALUES('$userName',0,0,0)";
        mysqli_query($GLOBALS['db'], $query);
    }
}
?>