
<?php include "components/buyerDashboardHeader.php"; ?>

<div class="main-title-create"><span class="blue-text-create">Popular </span>Advertisements</div>
<section class='card-container'><?php while ($row=mysqli_fetch_assoc($data['popular'])){include "components/adCard-Buyer.php";}?></section>


<div class="main-title-create"><span class="blue-text-create">Recent </span>Advertisements</div>
<section class='card-container'><?php while ($row=mysqli_fetch_assoc($data['new'])){include "components/adCard-Buyer.php";}?></section>


<div class="main-title-create"><span class="blue-text-create">NewBie </span>Advertisements</div>
<section class='card-container'><?php while ($row=mysqli_fetch_assoc($data['noob'])){include "components/adCard-Buyer.php";}?></section>

<?php include "components/footerHome.php"; ?>
