<?php
class homeModel extends database
{
    public function getAds()
    {
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName ORDER BY feedbacks  DESC "; 
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }
}
?>