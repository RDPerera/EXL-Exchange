<?php
class adminDashboardModel extends database
{
   /* check user is a admin or not */
   public function adminCheck($userName)
   {
       $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
       $userCheck = "SELECT * FROM admin WHERE userName='$userName' LIMIT 1";
       $result = mysqli_query($GLOBALS['db'], $userCheck);
       return mysqli_num_rows($result);
   }
   /* check user is a admin or not */
   public function moderatorCheck($userName)
   {
       $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
       $userCheck = "SELECT * FROM moderator WHERE userName='$userName' LIMIT 1";
       $result = mysqli_query($GLOBALS['db'], $userCheck);
       return mysqli_num_rows($result);
   }
}
?>
