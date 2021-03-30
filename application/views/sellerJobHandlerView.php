<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Responce</title>
    <?php $buyer=$data['buyer'];?>
    <?php $job=$data['job']; ?>
    <?php $adData=$data['adDetails'];?>
    <?php linkCSS('job-responce'); ?>
    <?php linkJS('jquery.min'); ?>
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("card"); ?>
    <?php linkFAV("ee-logo.png"); ?>
    <?php $jobs=$data['jobs']; ?>
    <?php $data=$data['memory'];?>
</head>

<body>
    <?php include "components/sellerDash.php"; ?>
    <div class="content-super">
        <div class="page-container">
            <div class="main-container">
            <div class="massenger-container">
                <div class="chat-top-header" >
                    <div class="img-container"><img src="<?php echo adIMG($adData['image']) ?>" class="addImg"></div>
                    <div class="title"> <?php echo $adData['title'];?></div>
                    <div class="ad-rating">
                        <span class='feed-container'><?php echo "LKR ".$adData['price'].".00"; ?></span>
                        <span class='adID-container'><?php echo "Advertisement Id : ".$adData['advertisementID']; ?></span>
                        <span class='category-container'><?php echo "Category : ".$adData['category']; ?></span>
                        <span class='rate-container'><img src="<?php echo icoIMG('icons8-star-96.png') ?>"class='ratingIcon'>
                        <span class='rating'><?php echo $adData['rate']." | Feedbacks ".$adData['feedbacks']; ?></span>
                    </div>
                    <div class="content"><?php echo $adData['content'] ?></div>
                    
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
                    <span >Current Status Of Job : 
                    <?php     
                        if($job['jobStatus']=='0')
                        {
                            echo "<span style='color: #ffc107 ; font-weight:500'> Pending </span>";
                        }
                        else if($job['jobStatus']=='1')
                        {
                            echo "<span style='color: #00c241 ; font-weight:500'> Pending for buyer payment</span>";
                        }
                        else if($job['jobStatus']=='2')
                        {
                            echo "<span style='color: #d82303 ; font-weight:500'> Rejected </span>";
                        }
                        else if($job['jobStatus']=='3')
                        {
                            echo "<span style='color: #313fff ; font-weight:500'> Completed </span>";
                        }
                        else if($job['jobStatus']=='4')
                        {
                            echo "<span style='color: #00c241 ; font-weight:500'> Running</span>";
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
                        ?>>
                        <table>
                            <tr><td>Job ID </td><td><?php echo $job['jobId']; ?></td></tr>
                            <tr><td>Advertisement ID </td><td><?php echo $adData['advertisementID']; ?></td></tr>
                            <tr><td>Seller(Owner) User Name</td><td><?php echo $adData['userName']; ?></td></tr>
                            <tr><td>Buyer User Name</td><td><?php echo $buyer; ?></td></tr>
                            <tr><td>Submission DeadLine </td><td id="dead-line"></td></tr>
                            <tr><td>Job Price</td><td>Rs.<span id="basic-payment"><?php echo $adData['price'].".00"; ?></span></td></tr>
                            <tr><td>Additional Payments</td><td id="add-payment"></td></tr>
                            <tr><td>Total Payment</td><td id="total-payment"></td></tr>
                        </table>
                    </div>
                    <div class="request-buttons">
                        <div class="button-set" ><div <?php 
                        if($job['jobStatus']!='0')
                        {
                            echo "style='display:none'";
                        }
                        ?>>
                        <a href="<?php echo BASEURL.'/sellerJobHandler/accept/'.$job['jobId']; ?>"><button class="accept-ad" >Accept</button></a>
                        <a href="<?php echo BASEURL.'/sellerJobHandler/reject/'.$job['jobId']; ?>"><button class="reject-ad" >Reject</button></a></div>
                            <?php if($job['jobStatus']=='3' or $job['jobStatus']=='1' or $job['jobStatus']=='4'){ ?><a class="hideme" target="_blank" href="<?php echo BASEURL."/invoice/get/".$job['jobId']; ?>"><div name="x" class="std-ad" >Get an Invoice</div></><?php } ?>
                            <a class="hideme" target="_blank" href="<?php echo BASEURL.'/helpCenter' ?>"><div name="z" class="std-ad" >Help</div></a> 
                            <a class="hideme" href="<?php echo BASEURL.'/sharePoint' ?>"><div name="z" class="comp-ad" >Go To Job</div></a> 
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
    <?php linkJS("jobResponce"); ?>
</body>

</html>