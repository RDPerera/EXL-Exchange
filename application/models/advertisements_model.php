<?php

class advertisements_model extends database
{

    public function store($date, $status, $category, $image, $title, $tag, $content, $userName, $member1, $member2, $member3, $price)
    {

        $title = mysqli_real_escape_string($GLOBALS['db'], $title);
        $category = mysqli_real_escape_string($GLOBALS['db'], $category);
        $status = mysqli_real_escape_string($GLOBALS['db'], $status);
        $tag = mysqli_real_escape_string($GLOBALS['db'], $tag);
        $content = mysqli_real_escape_string($GLOBALS['db'], $content);
        $member1 = mysqli_real_escape_string($GLOBALS['db'], $member1);
        $member2 = mysqli_real_escape_string($GLOBALS['db'],  $member2);
        $member3 = mysqli_real_escape_string($GLOBALS['db'],  $member3);
        $price = mysqli_real_escape_string($GLOBALS['db'], $price);


        $query = "INSERT INTO advertisement (dateTime,status,category,image,title,tag,content,userName,member1,member2,member3,price) VALUES ('$date','$status', '$category','$image' , '$title' , '$tag' ,'$content' , '$userName' , '$member1' , '$member2' , '$member3','$price')";
        echo $query;
        mysqli_query($GLOBALS['db'], $query);
        // $complete = "";

    }

    public function retrieve($adID)
    {
        $query = "SELECT * FROM advertisement WHERE advertisementID = '$adID'";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_row($result);
        return $row;
    }

    public function delete($adID)
    {
        $query = "DELETE FROM advertisement WHERE advertisementID = '$adID'";

        if (mysqli_query($GLOBALS['db'], $query)) {
            // echo "Deleted the advertisement - $adID successfully";
        }
    }

    public function getDataByID($adID)
    {
        $query = "SELECT * FROM advertisement WHERE advertisementID = '$adID'";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_row($result);
        return $row;
    }

    public function updateWithImage($adID,$status, $category, $image, $title, $tag, $content, $userName, $member1, $member2, $member3, $price)
    {

        $title = mysqli_real_escape_string($GLOBALS['db'], $title);
        $category = mysqli_real_escape_string($GLOBALS['db'], $category);
        $status = mysqli_real_escape_string($GLOBALS['db'], $status);
        $tag = mysqli_real_escape_string($GLOBALS['db'], $tag);
        $content = mysqli_real_escape_string($GLOBALS['db'], $content);
        $member1 = mysqli_real_escape_string($GLOBALS['db'], $member1);
        $member2 = mysqli_real_escape_string($GLOBALS['db'],  $member2);
        $member3 = mysqli_real_escape_string($GLOBALS['db'],  $member3);
        $price = mysqli_real_escape_string($GLOBALS['db'], $price);

        $query = "UPDATE advertisement SET image = '$image' , status = '$status' ,category = '$category', title = '$title' ,tag = '$tag' ,content = '$content' , member1 = '$member1',member2 = '$member2' ,member3 = '$member3' ,price = '$price' WHERE advertisementID = '$adID' ";
        mysqli_query($GLOBALS['db'], $query);
    }
    public function updateWithoutImage($adID,$status, $category, $title, $tag, $content, $userName, $member1, $member2, $member3, $price)
    {
        
        $title = mysqli_real_escape_string($GLOBALS['db'], $title);
        $category = mysqli_real_escape_string($GLOBALS['db'], $category);
        $status = mysqli_real_escape_string($GLOBALS['db'], $status);
        $tag = mysqli_real_escape_string($GLOBALS['db'], $tag);
        $content = mysqli_real_escape_string($GLOBALS['db'], $content);
        $member1 = mysqli_real_escape_string($GLOBALS['db'], $member1);
        $member2 = mysqli_real_escape_string($GLOBALS['db'],  $member2);
        $member3 = mysqli_real_escape_string($GLOBALS['db'],  $member3);
        $price = mysqli_real_escape_string($GLOBALS['db'], $price);

        $query = "UPDATE advertisement SET status = '$status' ,category = '$category', title = '$title' ,tag = '$tag' ,content = '$content' , member1 = '$member1',member2 = '$member2' ,member3 = '$member3' ,price = '$price' WHERE advertisementID  = '$adID' ";
        mysqli_query($GLOBALS['db'], $query);
    }

    public function checkAdLimit($userName)
    {
        $query = "SELECT COUNT(advertisementID) AS count FROM advertisement WHERE username= '$userName'";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function recordAdClicks($adID,$ip)
    {
        $query = "INSERT INTO ad_stats(adID,date,ip) VALUES('$adID',NOW(),'$ip')";
        mysqli_query($GLOBALS['db'], $query);
    }


    public function retrieveReviewData($adID)
    {
        $query = "SELECT review,buyerId FROM ad_reviews WHERE adverticementId='$adID';";
        $result = mysqli_query($GLOBALS['db'], $query);
        if (mysqli_num_rows($result) > 0) 
        {
            return $result;
        }

    }


    
}
