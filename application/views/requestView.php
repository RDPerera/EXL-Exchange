<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <?php linkCSS('chat'); ?>
    <?php linkFav('ee-logo.png');?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    <div class="chat-header" id="chat-header">
    </div>
    <div class="chat-container">
    <div class="chat-body" id="chat-body">
    <div id="chat-container"></div>
    </div>
    <div class="message-input-container">
        <input type="text" name="message" class="message-input" placeholder="Type a message..." id="message">
        <button name="message-submit" class="message-submit" id="message-submit" >SEND</button>
    </div>
    </div> 

    <script>
    $(document).ready(function(){ 
        fetchChat();
        fetchStatus();
        updateScroll();
        var scrolled = false;
        setInterval(function(){
            $("#chat-body").on('scroll', function(){
                scrolled=true;
            });
            if(!scrolled){
                updateScroll();
            }
            fetchChat();
            fetchStatus();
        },100);

        $(document).on('click', '.message-submit', function(){
        var chat_message = $('#message').val();
        if(chat_message!=""){
            $.ajax({
                url:"adChat/send",
                method:"POST",
                data:{message:chat_message},
                success:function(data){
                    $('#message').val('');
                    scrolled = false;
                }
            })
            
        }
        });

        function updateScroll(){
            var element = document.getElementById("chat-body");
            element.scrollTop = element.scrollHeight;
        }
        function fetchChat()
        {
            $.ajax({
                url:"adChat/index",
                method:"POST",
                success:function(data)
                {
                    $('#chat-container').html(data);
                }
            })
        }
        function fetchStatus()
        {
            $.ajax({
                url:"adChat/status",
                method:"POST",
                success:function(data)
                {
                    $('#chat-header').html(data);
                }
            })
        }
    });
    </script>
</body>
</html>