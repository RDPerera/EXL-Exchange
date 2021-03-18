

    <?php
        $chat=$data['chat'];
        foreach ($chat as $row)
        {
            if($row['sender']==$data['sender'])
            {
                echo "<div align='right'><div class='message-container' id='sender' >".$row['message']."<span  class='time'>".substr($row['time'],0,5)."</span></div></div>";
            }
            else{
                echo "<div align='left'><div class='message-container' id='receiver' >".$row['message']."<span  class='time'>".substr($row['time'],0,5)."</span></div></div>";
            }
        }   
    ?>
   


