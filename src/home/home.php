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
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

</head>

<body>

    <!-- the navigation bar -->
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" class="icon" onclick="scrollTheMenu()">
            <i class="fa fa-bars"></i> </a>
        <img src="../img/logoWhite.png" class="exlLogo">
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
    <div class="main-title-create"><span class="blue-text-create">Top </span>Advertisements</div>
    <section class='card-container'>


    <?php 
    
    echo"
        <div class='card'>
            <div class='card-top'>
                <a href=''><img src='../img/bp.png' alt='Unsplash Photo'></a></div>
            <div class='card-content'>
                <div class='top'>
                <div class='user'><img src='../img/profile.jpg' class='profile'><span class='name'><a href=''>Dilan Perera</a></span><span class='srate'>Seller Rate 4.0</span></div>
                <a href=''><span class='title'>I will write quality blog posts, SEO articles, and website content</span></a>
                </div>
                <div class='bottom'>
                        <button class='price'>LKR 1500.00</button>
                        <span class='rate-container'><img src='..\img\icons\icons8-star-96.png' class='ratingIcon'>
                        <span class='rating'>5.0</span>
        <span></div></div></div>
        ";

    ?>


    </section>
    <div class='main-title-create'><span class='blue-text-create'>Recent </span>Advertisements</div>
    <section class='card-container'>


    <?php 
    echo"
        <div class='card'>
            <div class='card-top'>
                <a href=''><img src='../img/bp.png' alt='Unsplash Photo'></a></div>
            <div class='card-content'>
                <div class='top'>
                <div class='user'><img src='../img/profile.jpg' class='profile'><span class='name'><a href=''>Dilan Perera</a></span><span class='srate'>Seller Rate 4.0</span></div>
                <a href=''><span class='title'>I will write quality blog posts, SEO articles, and website content</span></a>
                </div>
                <div class='bottom'>
                        <button class='price'>LKR 1500.00</button>
                        <span class='rate-container'><img src='..\img\icons\icons8-star-96.png' class='ratingIcon'>
                        <span class='rating'>5.0</span>
        <span></div></div></div>
        ";
        
    ?>

    </section>
    <script type="text/javascript" src="../js/homeNavBar.js"></script>
    <script type="text/javascript" src="../js/homeSlideShow.js"></script>

<footer>
<div class="footer-container">
    <span class="footer-text"> © EXL-Exchange 2020</span>
    <span class="social-media">
        <a href="#"><i class="fab fa-facebook-square"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </span>
</div>
</footer>
</body>

</html>