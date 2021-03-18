
    <?php
        echo "<p style='margin:20px;font-size:18px;font-weight:500'>Collbrators</p>";
        $chat=$data['chatStatus'];
        $user=$data['userDetails'];
        if($chat['status']=='1'){$status=" Online";}
        else{$status="Last Seen ".$chat['date_time'];}
        $render = "
        <div class='data-section' id='contact' style='background-color:#0370e4;padding:5px;margin-bottom:4px;border-radius:30px;margin-right:10px;margin-left:10px;box-shadow: 0 0px 2px 0 rgba(0, 0, 0, 0.1);'><img src='".userIMG($user['profilePicture'])."' class='profile-picture'>
        <span class='username'>".$user['firstName']." ".$user['lastName']."</span><span class='user-status'>".
        $status."</span></div></div>
        ";
        echo $render;
        if($data['count']>0){
        $chat=$data['chatStatus1'];
        $user=$data['userDetails1'];
        if($chat['status']=='1'){$status=" Online";}
        else{$status="Last Seen ".$chat['date_time'];}
        $render = "
        <div class='data-section' id='contact' style='background-color:#0370e4;padding:5px;margin-bottom:4px;border-radius:30px;margin-right:10px;margin-left:10px;box-shadow: 0 0px 2px 0 rgba(0, 0, 0, 0.1);'><img src='".userIMG($user['profilePicture'])."' class='profile-picture'>
        <span class='username'>".$user['firstName']." ".$user['lastName']."</span><span class='user-status'>".
        $status."</span></div></div>
        ";
        echo $render;}
        if($data['count']>1){
        $chat=$data['chatStatus2'];
        $user=$data['userDetails2'];
        if($chat['status']=='1'){$status=" Online";}
        else{$status="Last Seen ".$chat['date_time'];}
        $render = "
        <div class='data-section' id='contact' style='background-color:#0370e4;padding:5px;margin-bottom:4px;border-radius:30px;margin-right:10px;margin-left:10px;box-shadow: 0 0px 2px 0 rgba(0, 0, 0, 0.1);'><img src='".userIMG($user['profilePicture'])."' class='profile-picture'>
        <span class='username'>".$user['firstName']." ".$user['lastName']."</span><span class='user-status'>".
        $status."</span></div></div>
        ";
        echo $render;}

        if($data['count']>2){
        $chat=$data['chatStatus3'];
        $user=$data['userDetails3'];
        if($chat['status']=='1'){$status=" Online";}
        else{$status="Last Seen ".$chat['date_time'];}
        $render = "
        <div class='data-section' id='contact' style='background-color:#0370e4;padding:5px;margin-bottom:3px;border-radius:30px;margin-right:10px;margin-left:10px;box-shadow: 0 0px 2px 0 rgba(0, 0, 0, 0.1);'><img src='".userIMG($user['profilePicture'])."' class='profile-picture'>
        <span class='username'>".$user['firstName']." ".$user['lastName']."</span><span class='user-status'>".
        $status."</span></div></div>
        ";
        echo $render;}
    ?>
   


