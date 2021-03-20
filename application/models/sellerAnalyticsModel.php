<?php

class sellerAnalyticsModel extends database
{
    public function retrieveClicksData($adID)
    {
        //setting header to json
        header('Content-Type: application/json');

        //query to get the number of clicks of an advertisement
        $query = sprintf("SELECT COUNT(recordID) AS clicks,date FROM ad_stats WHERE adID='$adID' GROUP BY date;");

        //execute query
        $result = $GLOBALS['db']->query($query);

        //loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }

        //free memory associated with result
        $result->close();

        //return the data
        return $data;
        
    }
}
