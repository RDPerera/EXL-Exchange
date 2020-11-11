<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <?php linkCSS('chat'); ?>
    <?php linkFav('ee-logo.png');?> 
</head>
<body>
    <div class="chat-container">
    <?php
        $chat=$data['chat'];
        foreach ($chat as $row)
        {
            if($row['sender']==$data['sender'])
            {
                echo "<div align='right'><div class='message-container' id='sender'>".$row['message']."<span>".substr($row['time'],0,5)."</span></div></div>";
            }
            else{
                echo "<div align='left'><div class='message-container' id='receiver'>".$row['message']."<span>".substr($row['time'],0,5)."</span></div></div>";
            }
        }   
    ?>
    <form method="post"action="<?php echo BASEURL.'/chat/submit';?>"  class="message-input-container">
        <input type="text" name="message" class="message-input" placeholder="Type A Message" id="message">
        <input type="submit" class="message-submit" name="submit" value="SEND" >
        
    </form>
    </div> 
    <div id="user_details"></div>
</body>
</html>