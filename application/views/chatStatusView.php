

    <?php
        $chat=$data['chatStatus'];
        $user=$data['userDetails'];
        if($chat['status']=='1')
        {
            $status=" Online";
        }
        else
        {
            $status="Last Seen ".$chat['date_time'];
        }
        $render = "
        <div class='data-section'><img src='".userIMG($user['profilePicture'])."' class='profile-picture'>
        <span class='username'>".$user['firstName']." ".$user['lastName']."</span><span class='user-status'>".
        $status."</span></div>
        ";
        echo $render;
    ?>
   


