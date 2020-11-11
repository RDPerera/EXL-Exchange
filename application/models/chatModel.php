<?php
    class chatModel extends database
    {
        public function send($message,$sender,$receiver,$date,$time)
        {
            $query = "INSERT INTO user_message 
            VALUES('$receiver', '$sender', '$message','$date','$time')";
            mysqli_query($GLOBALS['db'], $query);
        }
        public function getChat($sender,$receiver)
        {
            $chat = "SELECT * FROM user_message WHERE (sender='$sender' AND receiver='$receiver') OR (sender='$receiver' AND receiver='$sender')";
            $result = mysqli_query($GLOBALS['db'], $chat);
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
?>