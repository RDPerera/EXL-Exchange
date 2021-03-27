<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Responce</title>
    <?php $buyer=$data['buyer'];?>
    <?php $job=$data['job']; ?>
    <?php $data=$data['adDetails'];?>
    <?php linkCSS('chat'); ?>
    <?php linkJS('jquery.min'); ?>
</head>
<body>

    <div class="main-container">
    <div class="massenger-container">
        <div class="chat-top-header" >
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
            <span >Current Status Of Job : 
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
                //when payment gateway is implemented this part should change
            ?>
            </span>
            </div>
            <div class="set-timer" id="date-title-container" style="display:none">
            <span id="date-title">Set Seller Product Submission Date & Time </span>
            <div class="cluster" style="float:right">
                <input type="date"  id="date" class="datetime" step="any" name="date" value="<?php echo $job['date'] ?>">
                <input type="time" id="time" class="datetime" step="any" name="time" value="<?php echo $job['time'] ?>">
            </div>
            </div>
            <div class="set-timer" id="price-title-container" style="display:none">
            <span id='price-title'>Additional Payment For Seller</span>
            <div class="cluster" style="float:right" id="price-section">
            Rs.<input type="text" id="ad-pay" class="datetime" name="additionalPrice" value="<?php echo $job['additionalPayment'] ?>">
            </div>
            </div>
            <div class="request-container">
            <div class="request-details"
            <?php 
                if($job['jobStatus']=='1' or $job['jobStatus']=='2')
                {
                    echo "style='background-color:#FBFBFB';";
                }
                ?>
            >
                <table>
                    <tr><td>Job ID </td><td><?php echo $job['jobId']; ?></td></tr>
                    <tr><td>Advertisement ID </td><td><?php echo $data['advertisementID']; ?></td></tr>
                    <tr><td>Seller(Owner) User Name</td><td><?php echo $data['userName']; ?></td></tr>
                    <tr><td>Buyer User Name</td><td><?php echo $buyer; ?></td></tr>
                    <tr><td>Submission DeadLine </td><td id="dead-line"></td></tr>
                    <tr><td>Job Price</td><td>Rs.<span id="basic-payment"><?php echo $data['price'].".00"; ?></span></td></tr>
                    <tr><td>Additional Payments</td><td id="add-payment"></td></tr>
                    <tr><td>Total Payment</td><td id="total-payment"></td></tr>
                </table>
            </div>
            <div class="request-buttons"
            <?php 
                if($job['jobStatus']=='1' or $job['jobStatus']=='2')
                {
                    echo "style='display:none'";
                }
                ?>>
                <div class="button-set" >
                <a href="<?php echo BASEURL.'/jobResponce/accept/'.$job['jobId']; ?>"><button class="accept-ad" >Accept</button></a>
                <a href="<?php echo BASEURL.'/jobResponce/reject/'.$job['jobId']; ?>"><button class="reject-ad" >Reject</button></a>
                </div>
                
            </div>
            </div>
        </div>
    </div>
    </div>
    <?php linkJS("jobResponce"); ?>
