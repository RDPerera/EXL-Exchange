<?php
class deleteModeratorModel extends database
{
    /* Delete User from DB */
    public function deleteUser($id)
    {
        $del = mysqli_query($GLOBALS['db'],"delete from moderators where id = '$id'");
    }
    
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