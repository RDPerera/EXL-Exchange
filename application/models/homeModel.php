<?php
class homeModel extends database
{
    /* Return 12 Ads DESC order by feedbacks */
    public function getAdsPopular()
    {
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName ORDER BY feedbacks  DESC LIMIT 12"; 
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }
    /* Return 12 Ads ASC order by date */
    public function getAdsNew()
    {
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName ORDER BY dateTime  LIMIT 12 ";
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }
    /* Return 12 Ads ASC order by feedbacks */
    public function getAdsNoob()
    {
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName ORDER BY feedbacks  LIMIT 12 "; 
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }

}
?>