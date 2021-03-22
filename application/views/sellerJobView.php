<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("card"); ?>
    <?php linkFAV("ee-logo.png"); ?>
    <?php $mode=$data['mode']; ?>
    <?php $jobs=$data['jobs']; ?>
    <?php $data=$data['memory'];?>
</head>

<body>
    <input type="checkbox" id="home">
    <header class="header">
        <label for="home"><img src='<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png' class="home-menu"></label>
        <div class="left-head">Seller<span class="min-text"> Dashboard</span></div>
        <form method="post" action="<?php echo BASEURL.'/sellerdashboard/logout'; ?>">
            <div class="right-head"><input type="submit" name="logout" value="Log Out" class="head-btn"></div></form>
    </header>
    <div class="sidebar">
        <center>
            <div class="sidebar-profile-container">
                <a href="<?php echo BASEURL;?>/sellerdashboard/loadChangeDPView"><img src="<?php echo BASEURL; ?>/public/assets/img/userImages/<?php if ($data[0][2]) {
                                                                                                echo $data[0][2];
                                                                                            } else {
                                                                                                echo "pp_default.jpg";
                                                                                            } ?>" class="sidebar-profile"></a>
            </div>
            <span class="slidbar-name"><?php echo $data[0][0] . " " . $data[0][1]; ?></span>
        </center>
        <div class="sidebar-menu">
        <a href="<?php echo BASEURL; ?>/sellerdashboard"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-home-144.png" class="sidebar-icons"><span>Home</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-chat-96.png" class="sidebar-icons"><span>Messages</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/pending" <?php if($mode==1){echo "class='selected-item'";} ?>  ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/pending.png " class="sidebar-icons"><span>Pending Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/active" <?php if($mode==2){echo "class='selected-item'";} ?>><img src="<?php echo BASEURL; ?>/public/assets/img/icons/active.png " class="sidebar-icons"><span>Active Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob" <?php if($mode==3){echo "class='selected-item'";} ?>><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png " class="sidebar-icons"><span>All Job Request</span></a>
            <a href="<?php echo BASEURL; ?>/advertisements_controller"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-plus-math-96.png" class="sidebar-icons"><span>Create Advertisement</span></a>
            <a href="<?php echo BASEURL; ?>/sellerAnalytics"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Analytics</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-question-mark-96.png" class="sidebar-icons"><span>Help & Support</span></a>
            <a href="<?php echo BASEURL; ?>/sellercomplaint"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Complaints</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-settings-500.png" class="sidebar-icons"><span>Settings</span></a>
        </div>
    </div>

    <div class="content-super">
        <div class="page-container">
            <div class="content">
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
        </div>

    </div>
</body>

</html>