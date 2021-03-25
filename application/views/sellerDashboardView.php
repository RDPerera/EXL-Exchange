<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <div class="content">
                <div class="main-title"><span class="blue-text">Current</span> Advertisements</div>
                <div class="advertisements">
                    <?php
                    $cardCount = count($data) - 1;
                    if ($cardCount > 0) {
                        $i = 1;
                        while ($i <= $cardCount) {
                            if (!$data[$i][1]) //to check whether use have inserted an advertisement cover or not
                            {
                                $data[$i][1] = 'AdvertisementDefault.jpg'; // if not assign the default image
                            }
                            echo "<a href='".BASEURL."/advertisements_Controller/showAd/".$data[$i][0]."' style='text-decoration:none;color:black'>
                                <div class='card'>
                                    <img src='" . BASEURL . "/public/assets/img/adUploads/" . $data[$i][1] . "' class='card-image' />
                                    <div class='card-info'>
                                        <div class='card-title'>
                                            " . $data[$i][2] . "
                                        </div>
                                        <div class='card-category'>
                                            Category <span class='card-tag'>" . $data[$i][3] . "</span>
                                        </div>
                                        <div class='card-feedback'>
                                            Feedbacks <span class='card-feedback-number'>+" . $data[$i][4] . "</span>
                                        </div>
                                        <div class='card-rate'>
                                            Rate
                                            <span class='card-rate-number'><img src='" . BASEURL . "/public/assets/img/icons/icons8-star-96.png'
                                                    class='rate-star' />" . $data[$i][5] . "</span>
                                        </div>
                                        <div class='card-description'>
                                        " . $data[$i][6] . "
                                        </div>
                                    </div>
                                    <div class='card-price'>
                                        <span class='card-price-tag'>LKR " . $data[$i][7] . "</span>
                                    </div>
                                </div>
                                </a>
                                ";
                            $i++;
                        }
                    }
                    ?>
                   <a class="nostyle" href="<?php echo BASEURL; ?>/advertisements_Controller">  <!--  clear anchor tag styles -->
                    <div class="empty-card">
                        <img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-plus-math-96.png" width="50px" height="50px" style="vertical-align: middle; padding-right: 10px" />
                        Create An Advertisement
                        
                    </div>
                    </a>
                </div>
                <div class="main-title"><span class="blue-text">JOB</span> Requests</div>
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