<?php
class updateModeratorModel extends database
{

    /*fetch existing data*/
    public function fetchModeratorData($id)
    {
        $query = "SELECT DISTINCT * FROM moderator,user WHERE moderator.userName=user.userName AND user.userName='$id'";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    /* update a moderator from DB */
    public function updateUser($firstname , $lastname ,$startdate, $email,$id)
    {
        mysqli_query($GLOBALS['db'],"UPDATE moderator SET stsrtDate='$startdate' where userName='$id'");
        mysqli_query($GLOBALS['db'],"UPDATE user SET firstName='$firstname' ,lastName='$lastname', email='$email' where userName='$id'");
        
    }

     /* insert moderator data */
    public function insertmod($firstname,$lastname,$email,$startdate)
    {
        $sql = "INSERT INTO moderators (firstname,lastname,email,startdate) VALUES ('$firstname' , 
        '$lastname' , '$email' , '$startdate')";
        $result = mysqli_query($GLOBALS['db'], $sql);
    }

    

}