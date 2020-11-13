<?php include "components/headerHome.php"; ?>
    <title>Job Request</title>
    <?php linkCSS('chat'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>

    <div class="main-container">
    <div class="massenger-container">
        <div class="chat-top-header" >
            <?php $data=$data['adDetails'];?>
            
            <div class="img-container"><img src="<?php echo adIMG($data['image']) ?>" class="addImg"></div>
            <div class="title"> <?php echo $data['title'];?></div>
            <div class="ad-rating">
                <span class='feed-container'><?php echo "LKR ".$data['price']; ?></span>
                <span class='rate-container'><img src="<?php echo icoIMG('icons8-star-96.png') ?>"class='ratingIcon'>
                <span class='rating'><?php echo $data['rate']." | Feedbacks ".$data['feedbacks']; ?></span>
            </div>
            <div class="content"><?php echo $data['content'] ?></div>
            
        </div>
        <div class="chat-contacts" id="chat-header"></div>
        <div class="chat-main">
            <div class="chat-container">
            <div class="chat-body" id="chat-body"><div id="chat-container"></div></div>
            <div class="message-input-container">
                <input type="text" name="message" class="message-input" placeholder="Type a message..." id="message">
                <button name="message-submit" class="message-submit" id="message-submit" >SEND</button>
            </div>
            </div> 
        </div>
    </div>
    <div class="workspace-container">
        
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
                url:"adChat/adstatus",
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