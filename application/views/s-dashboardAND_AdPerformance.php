<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Responce</title>
    <?php $adData = $data[0][8]; ?>
    <?php $ClicksRequests = $data[0][9]; ?>
    <?php linkCSS('adPerformance'); ?>
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("card"); ?>
    <?php linkFAV("ee-logo.png"); ?>
    <?php linkJS("jquery.min"); ?>
    <?php linkJS("Chart.min"); ?>
    <?php linkJS("clicksGraph"); ?>

</head>

<body>

    <!-- To get the advertisement ID and make it avaible for the clicksGraph javascript file -->
    <script type="text/javascript">
        var adID = <?php echo $adData['advertisementID']; ?>;
    </script>

<input type="checkbox" id="home">
    <header class="header">
        <label for="home"><img src='<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png' class="home-menu"></label>
        <div class="left-head">Seller<span class="min-text"> Dashboard</span></div>
        <form method="post" action="<?php echo BASEURL . '/sellerDashboard/logout'; ?>">
            <div class="right-head"><input type="submit" name="logout" value="Log Out" class="head-btn"></div>
        </form>
    </header>
    <div class="sidebar">
        <center>
            <div class="sidebar-profile-container">
                <a href="<?php echo BASEURL; ?>/sellerDashboard/loadChangeDPView"><img src="<?php echo BASEURL; ?>/public/assets/img/userImages/<?php if ($data[0][2]) {
                                                                                                                                                    echo $data[0][2];
                                                                                                                                                } else {
                                                                                                                                                    echo "pp_default.jpg";
                                                                                                                                                } ?>" class="sidebar-profile"></a>
            </div>
            <span class="slidbar-name"><?php echo $data[0][0] . " " . $data[0][1]; ?></span>
        </center>
        <div class="sidebar-menu">
            <a href="<?php echo BASEURL; ?>/sellerDashboard"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-home-144.png" class="sidebar-icons"><span>Home</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/pending"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/pending.png " class="sidebar-icons"><span>Pending Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/active"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/active.png " class="sidebar-icons"><span>Active Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png " class="sidebar-icons"><span>All Job Request</span></a>
            <a href="<?php echo BASEURL; ?>/advertisements_Controller"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-plus-math-96.png" class="sidebar-icons"><span>Create Advertisement</span></a>
            <a href="<?php echo BASEURL; ?>/sellerAnalytics"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Analytics</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-question-mark-96.png" class="sidebar-icons"><span>Help & Support</span></a>
            <a href="<?php echo BASEURL; ?>/sellercomplaint"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Complaints</span></a>
        </div>
    </div>

    <div class="content-super">
        <div class="grid-container">
            <div class="ad">
                <div class="header1">
                    <div class="report-head">
                        <p>The Advertisement Information</p>
                    </div>
                </div>
                <div class="imag">
                    <div class="img-container"><img src="<?php echo adIMG($adData['image']) ?>" class="addImg"></div>
                </div>
                <div class="title">
                    <p><?php echo $adData['title']; ?></p>
                    <div class="rating">
                        <div class="ad-rating">
                            <span class='feed-container'><?php echo "LKR " . $adData['price'] . ".00"; ?></span>
                            <span class='category-container'><?php echo "Category : " . $adData['category']; ?></span>
                            <span class='rate-container'><img src="<?php echo icoIMG('icons8-star-96.png') ?>" class='ratingIcon'>
                                <span class='rating'><?php echo $adData['rate'] . " | Feedbacks " . $adData['feedbacks']; ?></span></span>
                            <span class='status-container'><?php echo "Status : " . $adData['status']; ?></span>
                        </div>
                    </div>
                </div>

                <div class="content1">
                    <div class="content"><?php echo $adData['content'] ?></div>
                </div>
                <div class="right">
                    <p>The RCR Value ~ <?php echo $ClicksRequests['rcr']; ?>%<span class='rcr'><br>The Request - Click Ratio measures the proportion of individuals who clicks an seller advertisement and subsequently requests it.</span></p>

                </div>
            </div>

            <div class="report">
                <div class="report-head">
                    <p>Advertisement Views</p>
                </div>
                <div class="report-graph">
                    <canvas id="clicksCanvas"></canvas>
                </div>
            </div>

            <div class="report">
                <div class="report-head">
                    <p>Job Requests</p>
                </div>
                <div class="report-graph">
                    <canvas id="requestsCanvas"></canvas>
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>

</body>

</html>