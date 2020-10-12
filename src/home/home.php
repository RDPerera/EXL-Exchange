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
    <link rel="stylesheet" type="text/css" href="../css/homeCards.css">
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


    <!-- the slideshow -->

    <div class="wholeSS">
        <div class="slideshow-container">

            <div class="mySlides fade">

                <img src="../img/ss7.jpg" style="width:100%" class="slideshow">
                <!-- <div class="text">The Exclusive Freelancing Platform for Undergraduates</div> -->
            </div>

            <div class="mySlides fade">

                <img src="../img/ss8.jpg" style="width:100%" class="slideshow">
                <!-- <div class="text">Join us today and enhance your skills</div> -->
            </div>

            <div class="mySlides fade">

                <img src="../img/ss9.jpg" style="width:100%" class="slideshow">
            </div>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>


    <!-- Set of advertisement cards -->
    <section class="card-container">
        <div class="card">
            <div class="card-top">
                <a href=""><img
                        src="https://images.unsplash.com/photo-1595147389795-37094173bfd8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1949&q=80"
                        alt="Unsplash Photo"></a>
            </div>
            <div class="card-content">

                <h6 class="tag tag-blue">Heading sample</h6>
                <a href="">
                    <h3 class="title">Sample Advertisement 01</h3>
                </a>
                <button class="price">LKR 1500.00</button>
                <div class="bottom">
                    <img class="ratingIcon" src="https://img.icons8.com/fluent/28/000000/star.png">
                    <p class="rating">5.0</p>

                </div>

            </div>
        </div>

    </section>


    <script type="text/javascript" src="../js/homeNavBar.js"></script>
    <script type="text/javascript" src="../js/homeSlideShow.js"></script>
</body>

</html>