<?php $job=$data['job']; ?>
<?php include "components/buyerDashboardHeader.php"; ?>

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
        <?php  if($job['jobStatus']!='3') { ?>
            <div class="countdown" id="countdown">
                <ul>
                <li><span id="days"></span>Days</li>
                <li><span id="hours"></span>Hours</li>
                <li><span id="minutes"></span>Minutes</li>
                <li><span id="seconds"></span>Seconds</li>
                </ul>
            </div>
        <?php } else { ?>
            <div class="completed-text">COMPLETED</div>
        <?php } ?>
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
                    echo "<span style='color: #00c241 ; font-weight:500'> Seller Accepted And Waiting For Payment</span>";
                }
                else if($job['jobStatus']=='2')
                {
                    echo "<span style='color: #d82303 ; font-weight:500'> Seller Declined</span>";
                }
                else if($job['jobStatus']=='3')
                {
                    echo "<span style='color: #313fff ; font-weight:500'> Completed</span>";
                }
                else if($job['jobStatus']=='4')
                {
                    echo "<span style='color: #00c241; font-weight:500'> Running</span>";
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
                <input type="submit" class="request-ad" name="submit" <?php if($job['jobStatus']!='0' or $job['jobStatus']!='2'){ echo "style='display:none' disabled";} ?> value="Resend Job Request">
                <div class="button-set" >
                <?php if($job['jobStatus']=='3' or $job['jobStatus']=='1' or $job['jobStatus']=='4'){ ?><a target="_blank" href="<?php echo BASEURL."/invoice/get/".$job['jobId']; ?>"><div name="x" class="std-ad" >Get an Invoice</div></><?php } ?>
                <a href="<?php echo BASEURL.'/complainBuyer' ?>"><div name="y" class="std-ad" >Complain </div></a>
                <a href="<?php echo BASEURL.'/sharePointBuyer' ?>"><div name="z" class="std-ad" >Help</div></a> 
                <?php if($job['jobStatus']=='1'){ ?><a target="_blank" href="<?php echo BASEURL.'/payment' ?>"><div name="x" class="comp-ad" >Do The Payment</div></a><?php } ?>
                <a href="<?php echo BASEURL.'/sharePointBuyer' ?>"><div name="z" class="comp-ad" >Go To Job</div></a> 
                </div>
            </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    <?php linkJS("jobStatus"); ?>
<?php include "components/fixedFooter.php"; ?>
