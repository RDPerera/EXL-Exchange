

    <?php
        $chat=$data['chatStatus'];
        $user=$data['userDetails'];
        if($chat['status']=='1')
        {
            $status="<svg class='blinking'><circle cx='5' cy='5' r='5' fill='white' /></svg> Online";
        }
        else
        {
            $status="Last Seen ".$chat['date_time'];
        }
        $render = "
        <img src='".userIMG($user['profilePicture'])."' class='profile-picture'>
        <div class='data-section'><span class='username'>".$user['firstName']." ".$user['lastName']."</span><span class='user-status'>".
        $status."</span></div>
        ";
        echo $render;
    ?>
   


