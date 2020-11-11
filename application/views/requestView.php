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
    <script>
    $(document).ready(function(){
        fetchChat();
        setInterval(function(){
        fetchChat();
        }, 5000);

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

    });
    </script>
</body>
</html>