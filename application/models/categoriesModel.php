<?php
class categoriesModel extends database
{

/* Return 12 Ads DESC order by feedbacks */
    public function getAdsPopular()
    {
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName ORDER BY feedbacks  DESC LIMIT 8"; 
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }

    public function executeFilter($minCondition,$maxCondition,$timeCondition,$categoryCondition,$sellerCondition, $keywordCondition){
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName AND $minCondition AND $maxCondition AND $timeCondition AND $categoryCondition AND  $keywordCondition AND $sellerCondition LIMIT 8"; 
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }

    
    public function executeList($keyword,$category){
        $query = "SELECT * FROM advertisement,user,seller WHERE advertisement.userName=user.userName AND seller.userName=user.userName AND $keyword AND $category LIMIT 8"; 
        $result=mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }
    }

}