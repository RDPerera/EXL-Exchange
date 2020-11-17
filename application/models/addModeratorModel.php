<?php
class addModeratorModel extends database
{
    /*insert the data into DB*/
    public function insertmod($username,$startdate)
    {
        $sql = "INSERT INTO moderators VALUES ('$username', '$startdate')";
        mysqli_query($GLOBALS['db'], $sql);
    }
    public function insertUser($username,$firstname,$lastname,$dob,$email,$passwd)
    {
        $pw=md5($passwd);
        $sql = "INSERT INTO user VALUES ('$username','$firstname','$lastname' ,'$dob','$email','0','1','12345','$pw','admin.png')";
        mysqli_query($GLOBALS['db'], $sql);
    }
}
?>
