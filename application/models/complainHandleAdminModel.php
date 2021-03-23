<?php
class complainHandleAdminModel extends database
{
    /* fetch all complain data where action status is 0 */
    public function fetchData()
    {
        $query = "SELECT * FROM complain WHERE adminId IS NULL";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    /*to approve the action status by moderator*/
    public function approve($adminId,$actionStatus,$compID)
    {
        $query="UPDATE complain SET  adminID='$adminId',actionStatus='$actionStatus' WHERE complainId = '$compID'";
        mysqli_query($GLOBALS['db'], $query);
    }
}
?>