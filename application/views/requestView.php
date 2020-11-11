<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <?php linkFav('ee-logo.png');?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    <div id="chat-container"></div>
    <div class="chat-container">
        <div class="message-input-container">
            <input type="text" name="message" class="message-input" placeholder="Type A Message" id="message">
            <button name="message-submit" class="message-submit" id="message-submit" >SEND</button>
        </div>
    </div> 
    <script>

    $(document).ready(function(){ 
        fetchChat();
        setInterval(function(){
            fetchChat();
        },500);

        function fetchChat()
        {
            $.ajax({
                url:"chat/index",
                method:"POST",
                success:function(data)
                {
                    $('#chat-container').html(data);
                }
            })
        }
        
        $(document).on('click', '.message-submit', function(){
        var chat_message = $('#message').val();
        if(chat_message!=""){
        $.ajax({
            url:"chat/send",
            method:"POST",
            data:{message:chat_message},
            success:function(data){
                $('#message').val('');
            }
        })
        }
        });

    });
    </script>
</body>
</html>