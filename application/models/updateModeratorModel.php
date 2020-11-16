<?php
class updateModeratorModel extends database
{

    /*fetch existing data*/
    public function fetchModeratorData($id)
    {
        $qry = mysqli_query($GLOBALS['db'],"select * from moderators where id='$id'");
        return mysqli_fetch_assoc($qry);
    }

    /* update a moderator from DB */
    public function updateUser($firstname , $lastname , $email, $startdate,$id)
    {
    
    $edit = mysqli_query($GLOBALS['db'],"update moderators set firstname='$firstname', lastname='$lastname'  , email='$email' , 
    startdate='$startdate' where id='$id'");
    }

     /* insert moderator data */
    public function insertmod($firstname,$lastname,$email,$startdate)
    {
        $sql = "INSERT INTO moderators (firstname,lastname,email,startdate) VALUES ('$firstname' , 
        '$lastname' , '$email' , '$startdate')";
        $result = mysqli_query($GLOBALS['db'], $sql);
    }

    /* fetch all moderators */
    public function fetchModerators()
    {
        $query = "SELECT * FROM moderators";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

}