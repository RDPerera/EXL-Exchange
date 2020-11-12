
<?php
    class adChatModel extends database
    {
        public function send($message,$sender,$receiver,$date,$time)
        {
            $query = "INSERT INTO ad_message 
            VALUES('$receiver', '$sender', '$message','$date','$time')";
            mysqli_query($GLOBALS['db'], $query);
        }
        public function getChat($adId,$sender,$seller,$col1,$col2,$col3,$buyer)
        {
            $chat = "SELECT * FROM ad_message WHERE adId='$adId' AND (sender='$sender' OR sender='$buyer' OR sender='$seller' OR sender='$col1' OR sender='$col2' OR sender='$col3')";
            $result = mysqli_query($GLOBALS['db'], $chat);
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        public function getStatus($receiver)
        {
            $chatStatus = "SELECT * FROM user_online WHERE userName='$receiver' LIMIT 1";
            $result = mysqli_query($GLOBALS['db'], $chatStatus);
            return mysqli_fetch_assoc($result);
        }
        public function getDetails($user)
        {
            $userDetails = "SELECT * FROM user WHERE userName='$user' LIMIT 1";
            $result = mysqli_query($GLOBALS['db'], $userDetails);
            return mysqli_fetch_assoc($result);
        }
        public function getCollaborators($adid)
        {
            $userDetails = "SELECT * FROM advertisement WHERE advertisementID ='$adid' LIMIT 1";
            $result = mysqli_query($GLOBALS['db'], $userDetails);
            return mysqli_fetch_assoc($result);
        }
    }
?>