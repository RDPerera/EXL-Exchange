
<?php
    class adChatModel extends database
    {
        public function send($message,$sender,$receiver,$date,$time)
        {
            $query = "INSERT INTO ad_message 
            VALUES('$receiver', '$sender', '$message','$date','$time')";
            mysqli_query($GLOBALS['db'], $query);
        }
        public function getChat($sender,$receiver)
        {
            $chat = "SELECT * FROM ad_message WHERE (sender='$sender' AND receiver='$receiver') OR (sender='$receiver' AND receiver='$sender')";
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
    }
?>