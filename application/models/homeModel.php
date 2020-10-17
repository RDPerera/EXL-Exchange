<?php
class homeModel extends database
{
    public function getAdsPopular()
    {
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName ORDER BY feedbacks  DESC "; 
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }
    public function getAdsNew()
    {
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName ORDER BY dateTime ";
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }
    public function getAdsNoob()
    {
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName ORDER BY feedbacks "; 
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }

}
?>