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
    public function retrieveRequestsData($adID)
    {
        //setting header to json
        header('Content-Type: application/json');

        //query to get the number of requests of an advertisement grouped by week
        $query = sprintf("SELECT CONCAT(YEAR(date), '/', WEEK(date)) AS theWeek, COUNT(jobId) AS requests FROM job WHERE adId='$adID' GROUP BY theWeek ORDER BY YEAR(DATE) ASC, WEEK(date) ASC;");

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
    public function totalCLicksRequests($adID)
    {
        //queries to get the total number of clicks
        $query1 = "CREATE OR REPLACE VIEW clicksTable AS SELECT COUNT(recordID) AS clicks FROM ad_stats WHERE adID='$adID' GROUP BY date;"; //creating the view
        mysqli_query($GLOBALS['db'], $query1);
        
        //to get the final output
        $query2 = "SELECT SUM(clicks) AS totalClicks FROM clicksTable;"; 
        $result = mysqli_query($GLOBALS['db'], $query2);
        $tempData1 = mysqli_fetch_assoc($result);
        $data['totalClicks'] = $tempData1['totalClicks'];
        

        //queries to get the total number of requests
        $query3 = "CREATE OR REPLACE VIEW requestsTable AS SELECT CONCAT(YEAR(date), '/', WEEK(date)) AS theWeek, COUNT(jobId) AS requests FROM job WHERE adId='$adID' GROUP BY theWeek ORDER BY YEAR(DATE) ASC, WEEK(date) ASC;"; //creating the view
        mysqli_query($GLOBALS['db'], $query3);

        //to get the final output
        $query4="SELECT SUM(requests) AS totalRequests FROM requestsTable;";
        $result = mysqli_query($GLOBALS['db'], $query4);
        $tempData2 = mysqli_fetch_assoc($result);
        $data['totalRequests'] = $tempData2['totalRequests'];

        return $data;
    }
}
