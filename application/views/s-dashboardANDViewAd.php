<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("viewAdvertisementByOwner"); ?>
    <?php linkFAV("ee-logo.png"); ?>
</head>

<body>
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
                <a href="<?php echo BASEURL; ?>/sellerDashboard/loadChangeDPView"><img src="<?php echo BASEURL; ?>/public/assets/img/userImages/<?php if ($data['profilePicture']) {
                                                                                                                                                    echo $data['profilePicture'];
                                                                                                                                                } else {
                                                                                                                                                    echo "pp_default.jpg";
                                                                                                                                                } ?>" class="sidebar-profile"></a>
            </div>
            <span class="slidbar-name"><?php echo $data['firstName'] . " " . $data['lastName']; ?></span>
        </center>
        <div class="sidebar-menu">
            <a href="<?php echo BASEURL; ?>/sellerDashboard"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-home-144.png" class="sidebar-icons"><span>Home</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/pending"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/pending.png " class="sidebar-icons"><span>Pending Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/active"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/active.png " class="sidebar-icons"><span>Active Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png " class="sidebar-icons"><span>All Job Request</span></a>
            <a href="<?php echo BASEURL; ?>/advertisements_Controller"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-plus-math-96.png" class="sidebar-icons"><span>Create Advertisement</span></a>
            <a href="<?php echo BASEURL; ?>/sellerAnalytics"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Analytics</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-question-mark-96.png" class="sidebar-icons"><span>Help & Support</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Complaints</span></a></div>
    </div>

    <div class="content-super">
        <div class="page-container">
            <div class="content">
                <div class="main-title"><span class="blue-text">My</span> Advertisements</div>
                <div class='row'>
                    <div>
                        <div class='column'>
                            <div class="polaroid">
                                <img src='../../public/assets/img/adUploads/<?php echo $data[4]; ?>' height='590px' width='590px'>
                                <div class="container">
                                    <p class='imageBottom'> <?php echo $data[3]; ?> Advertisements <br> #<?php echo $data[6]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class='column'>
                            <div class="polaroidRightColumn">
                                <h1> <?php echo $data[5]; ?> </h1>
                                <div class='class1'>Advertisement Description</div>
                                <p class='desc'> <br> <?php echo $data[7]; ?> <br> <br> </p>
                                <!-- <img src='https://img.icons8.com/fluent/48/000000/price-tag-pound.png' /> -->
                                <button class='button2'> The Price - LKR <?php echo $data[12]; ?>.00 </button>
                            </div>
                            <br><br>
                            <div class='adView'> <a class='adViewLink' href="<?php echo BASEURL; ?>/advertisements_Controller/updateAdLoad/<?php echo $data[0]; ?>"> Update Advertisement</a>
                            </div>
                            <div class='adView'> <a class='adViewLink' href="<?php echo BASEURL; ?>/advertisements_Controller/deleteAd/<?php echo $data[0]; ?>" onclick="return confirm('Are you sure you want to delete the advertisement?')"> Delete Advertisement</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>