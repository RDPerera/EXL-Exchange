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
</head>
<body>
<!-- the navigation bar -->
<div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" class="icon" onclick="scrollTheMenu()">
            <i class="fa fa-bars"></i> </a>
        <img src="<?php echo srcIMG("logoWhite.png"); ?>" class="exlLogo">
        <a href="<?php echo BASEURL?>" class="active">Home</a>
        <a href="<?php echo BASEURL.'/categories'?>">Categories</a>
        <a href="<?php echo BASEURL.'/about'?>">About</a>
        <a href="<?php echo BASEURL.'/contact'?>">Contact</a>
        
        <div class="buttons">
            <button class="signin-button" onclick="window.location.href='<?php echo BASEURL.'/login' ?>'">Sign In</button>
            <button class="signup-button" onclick="window.location.href='<?php echo BASEURL.'/registerController' ?>'">Sign Up</button>
        </div>
        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
</div>