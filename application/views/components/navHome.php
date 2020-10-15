
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
<script type="text/javascript" src="../js/homeNavBar.js"></script>