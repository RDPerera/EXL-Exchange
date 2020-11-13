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
        
        <div class="workspace-head"><p>Request a Job</p></div>
        <div class="timer-section">
            <div class="countdown">
                <ul>
                <li><span id="days"></span>days</li>
                <li><span id="hours"></span>Hours</li>
                <li><span id="minutes"></span>Minutes</li>
                <li><span id="seconds"></span>Seconds</li>
                </ul>
            </div>
            <p>Time Countdown For JOB</p>
            <div class="set-timer">
            Set Date And Time For A JOB <input type="datetime-local" id="birthdaytime" name="birthdaytime">
            </div>
        </div>
    </div>
    </div>
    <script>
    

    (function () {
        const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

            let birthday = "Sep 30, 2021 00:00:00",
            countDown = new Date(birthday).getTime(),
            x = setInterval(function() {    

                let now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById("days").innerText = Math.floor(distance / (day)),
                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                if (distance < 0) {
                let headline = document.getElementById("headline"),
                    countdown = document.getElementById("countdown"),
                    content = document.getElementById("content");

                headline.innerText = "It's my birthday!";
                countdown.style.display = "none";
                content.style.display = "block";

                clearInterval(x);
                }
                //seconds
            }, 0)
    }());




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