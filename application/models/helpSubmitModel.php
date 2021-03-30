<?php
/* help reuest submission model*/
class helpSubmitModel extends database
{
    /*insert the data into DB*/
    public function inserthelp($userName ,$issueType, $description, $attachment)
    {
        $sql = "INSERT INTO help(userName,issueType,description,attachments) VALUES ('$userName','$issueType', '$description', '$attachment')";

        mysqli_query($GLOBALS['db'], $sql);
    }

   
}
?>
