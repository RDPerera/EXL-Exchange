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
                echo "<div align='right'><div class='message-container' id='sender'>".$row['message']."<span>".$row['time']."</span></div></div>";
            }
            else{
                echo "<div align='left'><div class='message-container' id='receiver'>".$row['message']."<span>".$row['time']."</span></div></div>";
            }
        }   
    ?>
    <form method="post"action="<?php echo BASEURL.'/chat/submit';?>"  class="message-input-container">
        <input type="text" name="message" class="message-input">
        <input type="submit" class="message-submit" name="submit">
    </form>
    </div>  
</body>
</html>