<?php ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXL Exchange - The Freelancing Platform for Undergraduates</title>
    <link rel="icon" type="image/png" href="../img/icons/ee-logo.png">
    <link rel="stylesheet" type="text/css" href="../css/homeNavBar.css">
    <link rel="stylesheet" type="text/css" href="../css/homeSlideShow.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>

    <!-- the navigation bar -->
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" class="icon" onclick="scrollTheMenu()">
            <i class="fa fa-bars"></i> </a>
        <img src="../img/logoWhite.png" class="exlLogo">
        <a href="" class="active">Home</a>
        <a href="">Categories</a>
        <a href="">About</a>
        <a href="">Contact</a>
        <div class="buttons">
            <button class="signin-button" href="">Sign In</button>
            <button class="signup-button" href="">Sign Up</button>
        </div>

        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
   
    <br>
    <!-- the slideshow -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            
            <img src="../img/ss4.jpg" style="width:100%" class="slideshow">
            <div class="text">The Exclusive Freelancing Platform for Undergraduates</div>
        </div>

        <div class="mySlides fade">
          
            <img src="../img/ss5.jpg" style="width:100%" class="slideshow">
            <div class="text">Join us today and enhance your skills</div>
        </div>

        <div class="mySlides fade">
           
            <img src="../img/ss6.jpg" style="width:100%"  class="slideshow">
            <div class="text">The best platform to buy a high quality service</div>
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <script type="text/javascript" src="../js/homeNavBar.js"></script>
    <script type="text/javascript" src="../js/homeSlideShow.js"></script>
</body>

</html>