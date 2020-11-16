<?php
class addModeratorModel extends database
{
    /*insert the data into DB*/
    public function insertmod($firstname,$lastname,$email,$startdate)
    {
        $sql = "INSERT INTO moderators (firstname,lastname,email,startdate) VALUES ('$firstname' , 
        '$lastname' , '$email' , '$startdate')";
        $result = mysqli_query($GLOBALS['db'], $sql);
    }
}
?>
