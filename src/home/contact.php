<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXL Exchange - Contact</title>
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
        <a href="#" >Home</a>
        <a href="categories.php">Categories</a>
        <a href="about.php">About</a>
        <a href="contact.php" class="active">Contact</a>
        
        <div class="buttons">
            <button class="signin-button" onclick=" window.location.replace(../login/login.php)">Sign In</button>
            <button class="signup-button" onclick=" window.location.replace(../register/register.php)">Sign Up</button>
        </div>
        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        
    </div>
    <script type="text/javascript" src="../js/homeNavBar.js"></script>
    <script type="text/javascript" src="../js/homeSlideShow.js"></script>
</body>

</html>