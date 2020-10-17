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

    public function delete($adUsername)
    {
        $query = "DELETE FROM advertisement WHERE username = '$adUsername'";

        if (mysqli_query($GLOBALS['db'], $query)) {
            echo "Deleted the advertisement - $adUsername successfully";
        }
    }

    public function getDataByUsername($username)
    {
        $query = "SELECT * FROM advertisement WHERE username = '$username'";
        $result = mysqli_query($GLOBALS['db'], $query);
        $row = mysqli_fetch_row($result);
        return $row;
    }

    public function updateWithImage($status, $category, $image, $title, $tag, $content, $userName, $member1, $member2, $member3, $price)
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

        $query = "UPDATE advertisement SET image = '$image' , status = '$status' ,category = '$category', title = '$title' ,tag = '$tag' ,content = '$content' , member1 = '$member1',member2 = '$member2' ,member3 = '$member3' ,price = '$price' WHERE username = '$userName' ";
        mysqli_query($GLOBALS['db'], $query);
    }
    public function updateWithoutImage($status, $category, $title, $tag, $content, $userName, $member1, $member2, $member3, $price)
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

        $query = "UPDATE advertisement SET status = '$status' ,category = '$category', title = '$title' ,tag = '$tag' ,content = '$content' , member1 = '$member1',member2 = '$member2' ,member3 = '$member3' ,price = '$price' WHERE username = '$userName' ";
        mysqli_query($GLOBALS['db'], $query);
    }
}
