<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXL Exchange - The Freelancing Platform for Undergraduates</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <?php linkFAV("ee-logo.png"); ?>
    <?php linkCSS("homeNavBar"); ?>
    <?php linkCSS("homeCards") ?>
    <?php linkCSS("homeSlideShow") ?>
    <?php linkCSS("footer") ?>
    <?php linkCSS("buyer-dash") ?>
</head>
<body>
<!-- the navigation bar -->
<div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" class="icon" onclick="scrollTheMenu()">
            <i class="fa fa-bars"></i> </a>
        <img src="<?php echo srcIMG("logoWhite.png"); ?>" class="exlLogo">
        <a href="<?php echo BASEURL.'/buyerDashboard'?>" <?php if($data['curr-page']=="home"){echo "class='active'";} ?>>Home</a>
        <a href="#">Categories</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="<?php echo BASEURL.'/buyerjob/active'?>" <?php if($data['curr-page']=="active"){echo "class='active'";} ?>>Active Jobs</a>
        <a href="<?php echo BASEURL.'/buyerjob/pending'?>" <?php if($data['curr-page']=="pending"){echo "class='active'";} ?>>Pending Jobs</a>
        <a href="<?php echo BASEURL.'/buyerjob'?>" <?php if($data['curr-page']=="all"){echo "class='active'";} ?>>All Jobs</a>
        
        
        <div class="buttons">
        <img class="profile-pic" onclick="window.location.href='<?php echo BASEURL.'/buyerdashboard/loadChangeDPView' ?>'" src="<?php echo BASEURL;?>/public/assets/img/userImages/<?php if (isset($data["profilePic"])) {echo $data["profilePic"];} else {echo "pp_default.jpg";}?>" class="sidebar-profile">
        <img class="profile-pic" style="border:none;width:30px;border-radius:0px;height:30px;padding-bottom:5px;padding-right:5px;" onclick="window.location.href='<?php echo BASEURL.'/buyerdashboard/logout' ?>'" src="<?php echo BASEURL;?>/public/assets/img/icons/logout.png" class="sidebar-profile">
        <button  class="signin-button" onclick="window.location.href='<?php echo BASEURL.'/login' ?>'">Log Out</button>
        </div>
        
        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
</div>