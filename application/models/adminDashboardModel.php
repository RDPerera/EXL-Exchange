<?php
class adminDashboardModel extends database
{
    /* check user is a admin or not */
    public function adminCheck($userName)
    {
        $userName = mysqli_real_escape_string($GLOBALS['db'], $userName);
        $userCheck = "SELECT * FROM admin WHERE userName='$userName' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_num_rows($result);
    }
    /* check user is a admin or not */
    public function moderatorCheck($userName)
    {
        $userName = mysqli_real_escape_string($GLOBALS['db'], $userName);
        $userCheck = "SELECT * FROM moderator WHERE userName='$userName' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_num_rows($result);
    }

    //get the revenue data to generate the revenue plot
    public function retrieveRevenueData()
    {
        //setting header to json
        header('Content-Type: application/json');

        //query to get the revenue data
        $query = sprintf("SELECT CONCAT(YEAR(date), '/', WEEK(date)) AS theWeek, SUM(exlAmount) AS revenue FROM payment GROUP BY theWeek ORDER BY YEAR(DATE) ASC, WEEK(date) ASC;");

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

    //retrieve revenue data to generate the description
    public function retrieveRevenueThisMonth()
    {
        $query = "SELECT SUM(exlAmount) as thisMonthTotal FROM payment WHERE (MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE()));";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    //retrieve revenue data to generate the description
    public function retrieveRevenueAverage()
    {
        $query = "SELECT AVG(revenue) AS avgRevenue FROM (SELECT CONCAT(YEAR(date), '/', MONTH(date)) AS theMonth, SUM(exlAmount) AS revenue FROM payment GROUP BY theMonth ORDER BY YEAR(DATE) ASC, MONTH(date) ASC) AS T1;";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function retrieveVisitorByCountry()
    {
        //setting header to json
        header('Content-Type: application/json');

        //query to get the visitors grouped by country - for the current month
        $query = sprintf("SELECT ip,COUNT(recordID) AS visitors FROM ad_stats WHERE (MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())) GROUP BY ip;");

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

    public function retrieveVisitorByDate()
    {
        //setting header to json
        header('Content-Type: application/json');

        //query to get the number of clicks of an advertisement
        $query = sprintf("SELECT COUNT(recordID) AS visitors,date FROM ad_stats GROUP BY date;");

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

    public function totalAverageVisitors()
    {
        //query to get the total number of visitors for this month
        $query1 = "SELECT COUNT(recordID) AS totalVisitors FROM ad_stats WHERE (MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE()));"; 
        $result = mysqli_query($GLOBALS['db'], $query1);
        $tempData1 = mysqli_fetch_assoc($result);
        $data['totalVisitors'] = $tempData1['totalVisitors'];
        

        //to get the final output
        $query2="SELECT AVG(visitors) AS avgVisitors FROM (SELECT date, COUNT(recordID)AS visitors FROM ad_stats GROUP BY date) AS T1;";
        $result = mysqli_query($GLOBALS['db'], $query2);
        $tempData2 = mysqli_fetch_assoc($result);
        $data['avgVisitors'] = $tempData2['avgVisitors'];

        return $data;
    }

}
