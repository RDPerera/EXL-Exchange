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

        //query to get the 
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
}
