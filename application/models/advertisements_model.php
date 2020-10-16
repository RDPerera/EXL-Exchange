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
        mysqli_query($GLOBALS['db'], $query);
        // $complete = "";

    }

    public function retrieve($adID)
    {
        $query = "SELECT * FROM advertisement WHERE advertisementID = $adID";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_row($result);
        return $row;
    }
}
