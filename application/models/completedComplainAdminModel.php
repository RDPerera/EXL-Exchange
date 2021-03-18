<?php
class completedComplainAdminModel extends database
{
    /* fetch all complain data where action status is 0 */
    public function fetchData()
    {
        $query = "SELECT * FROM complain WHERE adminId!=''";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function getData()
    {
        $query = "SELECT * FROM complain WHERE modId!='' ";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function fetchDataCur()
    {
        $query = "SELECT * FROM complain WHERE adminId=''";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function getDataCur()
    {
        $query = "SELECT * FROM complain WHERE modId='' ";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
      /*to approve the action status by moderator*/
    public function approve($modId,$actionStatus,$compID)
    {
          $query="UPDATE complain SET  adminId='$modId',actionStatus='$actionStatus' WHERE complainId = '$compID'";
          mysqli_query($GLOBALS['db'], $query);
    }
    public function apply($modId,$actionStatus,$compID)
    {
          $query="UPDATE complain SET  modId='$modId',actionStatus='$actionStatus' WHERE complainId = '$compID'";
          mysqli_query($GLOBALS['db'], $query);
    }
}
?>