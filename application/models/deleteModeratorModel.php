<?php
class deleteModeratorModel extends database
{
    /* Delete User from DB */
    public function deleteUser($id)
    {
        mysqli_query($GLOBALS['db'],"delete from moderator where userName = '$id'");
        mysqli_query($GLOBALS['db'],"delete from user where userName = '$id'");
    }
    
    /* fetch all moderators */
    public function fetchModerators()
    {
        $query = "SELECT DISTINCT * FROM moderator,user WHERE moderator.userName=user.userName";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
}