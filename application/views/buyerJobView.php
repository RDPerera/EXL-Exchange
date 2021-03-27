
<?php include "components/buyerDashboardHeader.php"; ?>

<?php $jobs=$data['jobs']; ?>
<?php $mode=$data['mode']; ?>
<?php linkCSS("sdashboard"); ?>
<?php linkCSS("card"); ?>
<?php linkFAV("ee-logo.png"); ?>
<?php linkCSS("buyer-job");?>
<div class="main">
    <div class="main-title"><span class="blue-text"><?php 
    if($mode==1)
    {
        echo "Pending";
    }
    elseif($mode==2)
    {
        echo "Active";
    }
    else{
        echo "All";
    }
    ?> JOB</span> Requests</div>
    <?php 
            foreach ($jobs as $request){
                
    ?>
    <a href="<?php echo BASEURL.'/sellerJobHandler/get/'.$request['jobId'];?>" style="text-decoration:none;color:#333;">
    <div class="requests">
    
        <div class="request">
            <span><span class="request-title">Advertisemet ID</span><?php echo $request['adId'] ?></span>
            <span><span class="request-title">Job ID</span><?php echo $request['jobId'] ?></span>
            <span><span class="request-title">Buyer Name</span><?php echo $request['buyer'] ?></span>
            <span><span class="request-title">Request Status</span>
            <?php     
            if($request['jobStatus']=='0')
            {
                echo "<span style='color: #ffc107 ; font-weight:500'> Pending </span>";
            }
            else if($request['jobStatus']=='1')
            {
                echo "<span style='color: #00c241 ; font-weight:500'>  Accepted</span>";
            }
            else if($request['jobStatus']=='2')
            {
                echo "<span style='color: #d82303 ; font-weight:500'> Rejected </span>";
            }
            else if($job['jobStatus']=='3')
            {
                echo "<span style='color: #313fff ; font-weight:500'> Completed</span>";
            }
            //when payment gateway is implemented this part should change
        ?>
            </span>
            <span><span class="request-title">Submission Date</span><?php echo $request['date']." ".$request['time']; ?></span>
            <span><span class="request-title">JOB Payment</span><?php echo $request['price']; ?></span>
            <span><span class="request-title">Additional Payment</span><?php echo $request['additionalPayment']; ?></span>
        </div>
    </div></a>
        
            <?php } ?>
            </div>
<br><br>
<?php include "components/footerHome.php"; ?>
