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
        <a href="home.php" class="active">Home</a>
        <a href="categories.php">Categories</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        
        <div class="buttons">
            <button class="signin-button" onclick=" window.location.href='../login/login.php'">Sign In</button>
            <button class="signup-button" onclick=" window.location.href='../register/register.php'">Sign Up</button>
        </div>
        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
</div>