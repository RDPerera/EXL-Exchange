<?php
class completedComplainAdminModel extends database
{
    /* fetch all complain data where action status is 0 */
    public function fetchData()
    {
        $query = "SELECT * FROM complain WHERE modId IS NOT NULL AND adminId IS NOT NULL";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

      /*to approve the action status by moderator*/
    public function approve($modId,$actionStatus,$compID)
    {
          $query="UPDATE complain SET  modID='$modId',actionStatus='$actionStatus' WHERE complainId = '$compID'";
          mysqli_query($GLOBALS['db'], $query);
    }
}
?>