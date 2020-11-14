<?php $job=$data['job']; ?>
<?php include "components/headerHome.php"; ?>

    <?php linkCSS('chat'); ?>
    <?php linkJS('jquery.min'); ?>
</head>
<body>

    <div class="main-container">
    <div class="massenger-container">
        <div class="chat-top-header" >
            <?php $data=$data['adDetails'];?>
            <div class="img-container"><img src="<?php echo adIMG($data['image']) ?>" class="addImg"></div>
            <div class="title"> <?php echo $data['title'];?></div>
            <div class="ad-rating">
                <span class='feed-container'><?php echo "LKR ".$data['price'].".00"; ?></span>
                <span class='adID-container'><?php echo "Advertisement Id : ".$data['advertisementID']; ?></span>
                <span class='category-container'><?php echo "Category : ".$data['category']; ?></span>
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
        
        <div class="workspace-head"><p>Job Details</p></div>
        <form action="<?php echo BASEURL.'/job/resend/'.$job['jobId']; ?>" method="post">
        <div class="timer-section">
            <div class="countdown" id="countdown">
                <ul>
                <li><span id="days"></span>days</li>
                <li><span id="hours"></span>Hours</li>
                <li><span id="minutes"></span>Minutes</li>
                <li><span id="seconds"></span>Seconds</li>
                </ul>
            </div>
            <br>
            <div class="status-job" >
            <span >Current Status Of Job 
            <?php     
                if($job['jobStatus']=='0')
                {
                    echo "<span style='color: #ffc107 ; font-weight:500'> Pending For Seller</span>";
                }
                else if($job['jobStatus']=='1')
                {
                    echo "<span style='color: #00c241 ; font-weight:500'> Seller Accepted</span>";
                }
                else if($job['jobStatus']=='2')
                {
                    echo "<span style='color: #d82303 ; font-weight:500'> Seller Declined</span>";
                }
                //when payment gateway is implemented this part should change
            ?>
            </span>
            </div>
            <div class="set-timer" id="date-title-container">
            <span id="date-title">Set Seller Product Submission Date & Time </span>
            <div class="cluster" style="float:right">
                <input type="date"  id="date" class="datetime" step="any" name="date" value="<?php echo $job['date'] ?>">
                <input type="time" id="time" class="datetime" step="any" name="time" value="<?php echo $job['time'] ?>">
            </div>
            </div>
            <div class="set-timer" id="price-title-container">
            <span id='price-title'>Additional Payment For Seller</span>
            <div class="cluster" style="float:right" id="price-section">
            Rs.<input type="text" id="ad-pay" class="datetime" name="additionalPrice" value="<?php echo $job['additionalPayment'] ?>">
            </div>
            </div>
            <div class="request-container">
            <div class="request-details">
                <table>
                    <tr><td>Job ID </td><td><?php echo $job['jobId']; ?></td></tr>
                    <tr><td>Advertisement ID </td><td><?php echo $data['advertisementID']; ?></td></tr>
                    <tr><td>Seller(Owner) User Name</td><td><?php echo $data['userName']; ?></td></tr>
                    <tr><td>Submission DeadLine </td><td id="dead-line"></td></tr>
                    <tr><td>Job Price</td><td>Rs.<span id="basic-payment"><?php echo $data['price'].".00"; ?></span></td></tr>
                    <tr><td>Additional Payments</td><td id="add-payment"></td></tr>
                    <tr><td>Total Payment</td><td id="total-payment"></td></tr>
                </table>
            </div>
            <div class="request-buttons">
                <input type="submit" class="request-ad" name="submit" value="Resend Job Request">
            </div>
            </div>
        </div>
        </form>
    </div>
    </div>
<script>

(function () {
  const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;

  var t =
      document.getElementById("date").value +
      "T" +
      document.getElementById("time").value,
    countDown = new Date(t).getTime(),
    x = setInterval(function () {
      var now = new Date().getTime(),
        t =
          document.getElementById("date").value +
          "T" +
          document.getElementById("time").value,
        countDown = new Date(t).getTime(),
        distance = countDown - now;
      var total =
        parseFloat(document.getElementById("ad-pay").value) +
        parseFloat(document.getElementById("basic-payment").innerText);
      (document.getElementById("dead-line").innerText =
        document.getElementById("date").value +
        " " +
        document.getElementById("time").value),
        (document.getElementById("add-payment").innerText =
          "Rs." + document.getElementById("ad-pay").value),
        (document.getElementById("total-payment").innerText =
          "Rs." + total.toFixed(2)),
        (document.getElementById("countdown").style.color = "#333"),
        (document.getElementById("days").innerText = Math.floor(
          distance / day
        )),
        (document.getElementById("hours").innerText = Math.floor(
          (distance % day) / hour
        )),
        (document.getElementById("minutes").innerText = Math.floor(
          (distance % hour) / minute
        )),
        (document.getElementById("seconds").innerText = Math.floor(
          (distance % minute) / second
        ));
      // later when date is reached change color to red
      if (countDown < now) {
        distance = now - countDown;
        (document.getElementById("countdown").style.color = "red"),
          (document.getElementById("days").innerText =
            "-" + Math.floor(distance / day)),
          (document.getElementById("hours").innerText = Math.floor(
            (distance % day) / hour
          )),
          (document.getElementById("minutes").innerText = Math.floor(
            (distance % hour) / minute
          )),
          (document.getElementById("seconds").innerText = Math.floor(
            (distance % minute) / second
          ));
      }
    }, 0);
})();

$(document).ready(function () {
  fetchChat();
  fetchStatus();
  updateScroll();
  var scrolled = false;
  setInterval(function () {
    $("#chat-body").on("scroll", function () {
      scrolled = true;
    });
    if (!scrolled) {
      updateScroll();
    }
    fetchChat();
    fetchStatus();
  }, 100);

  $(document).on("click", ".message-submit", function () {
    var chat_message = $("#message").val();
    if (chat_message != "") {
      $.ajax({
        url: "adChat/send",
        method: "POST",
        data: { message: chat_message },
        success: function (data) {
          $("#message").val("");
          scrolled = false;
        },
      });
    }
  });

  function updateScroll() {
    var element = document.getElementById("chat-body");
    element.scrollTop = element.scrollHeight;
  }
  function fetchChat() {
    $.ajax({
      url: "adChat/index",
      method: "POST",
      success: function (data) {
        $("#chat-container").html(data);
      },
    });
  }
  function fetchStatus() {
    $.ajax({
      url: "adChat/adstatus",
      method: "POST",
      success: function (data) {
        $("#chat-header").html(data);
      },
    });
  }
});


</script>
<?php include "components/footerHome.php"; ?>
