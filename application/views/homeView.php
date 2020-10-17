
<?php include "components/headerHome.php"; ?>
<?php include "components/sliderHome.php"; ?>
<div class="main-title-create"><span class="blue-text-create">Top </span>Advertisements</div>
<section class='card-container'>
<?php 
//http://localhost/EXL-Exchange/assets/img/userImages/dilan.png
    while ($row=mysqli_fetch_assoc($data))
    {
        include "components/adCard.php";
    }    
?>
</section>



<?php include "components/footerHome.php"; ?>
