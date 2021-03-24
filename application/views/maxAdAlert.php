<!-- <?php
        echo "<script>
        alert('You have reached the maximum limit of advertisements you can create.!');
        window.location.href='" . BASEURL . "/sellerDashboard';
     </script>";
        ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement Limit Notifier</title>
    <?php linkCSS("alert"); ?>
    <?php linkCSS("homeCards") ?>
    <?php linkJS("adAlert"); ?>
</head>

<body>
    <section class="cards">

        <article class="card card--2">
            <div class="card__info-hover">
            </div>
            <div class="card__img"></div>
            <a href='<?php echo BASEURL; ?>/sellerDashboard' class="card_link">
                <div class="card__img--hover"></div>
            </a>
            <div class="card__info">
            <h3 class="card__title">Advertisement Limit Reached.!</h3>
                <span class="card__category">You have reached the limit of maximumm number of advertisements that can be created.</span>
               
            </div>
        </article>



    </section>

</body>

</html>