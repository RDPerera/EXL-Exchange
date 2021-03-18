

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
        <div class='data-section' style='background-color:#0370e4;padding:5px;margin-top:10px;margin-bottom:4px;border-radius:30px;margin-right:10px;margin-left:10px;box-shadow: 0 0px 2px 0 rgba(0, 0, 0, 0.1);'><img src='".userIMG($user['profilePicture'])."' class='profile-picture'>
        <span class='username'>".$user['firstName']." ".$user['lastName']."</span><span class='user-status'>".
        $status."</span></div>
        ";
        echo $render;
    ?>
   


