<?php include "components/headerHome.php"; ?>
    <title>Job Request</title>
    <?php linkCSS('chat'); ?>
    <?php linkJS('jquery.min'); ?>
</head>
<body>

    <div class="main-container" style="margin-bottom:30px">
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
        <div class="workspace-head"><p>Request a Job</p></div>
        <div class="timer-section">
            <div class="countdown" id="countdown">
                <ul>
                <li><span id="days"></span>days</li>
                <li><span id="hours"></span>Hours</li>
                <li><span id="minutes"></span>Minutes</li>
                <li><span id="seconds"></span>Seconds</li>
                </ul>
            </div>
            <form method="post" action="<?php echo BASEURL.'/jobRequest/send';?>">
            <div class="set-timer" id="date-title-container">
                <span id="date-title">Set Seller Product Submission Date & Time </span>
                <div class="cluster" style="float:right">
                    <input type="date"  id="date" class="datetime" step="any" name="job-date">
                    <input type="time" id="time" class="datetime" step="any" name="job-time">
                </div>
                </div>
                <div class="set-timer" id="price-title-container">
                <span id='price-title'>Additional Payment For Seller</span>
                <div class="cluster" style="float:right" id="price-section">Rs.<input type="text" id="ad-pay" class="datetime" name="additionalPayment" value="00.00"></div>
                </div>
                <div class="request-container">
                    <div class="request-details">
                        <table>
                            <tr><td>Advertisement ID </td><td><?php echo $data['advertisementID']; ?></td></tr>
                            <tr><td>Seller(Owner) User Name</td><td><?php echo $data['userName']; ?></td></tr>
                            <tr><td>Submission DeadLine </td><td id="dead-line"></td></tr>
                            <tr><td>Job Price</td><td>Rs.<span id="basic-payment"><?php echo $data['price'].".00"; ?></span></td></tr>
                            <tr><td>Additional Payments</td><td id="add-payment"></td></tr>
                            <tr><td>Total Payment</td><td id="total-payment"></td></tr>
                        </table>
                    </div>
                    <div class="request-buttons">
                        <input type="submit" class="request-ad" name="submit" value="Send Job Request">
                    </div>
                </div>
        </div>
    </form>
    </div>
    </div>
    <?php linkJS("jobRequest"); ?>
    <?php include "components/footerHome.php"; ?>