<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View the advertisement</title>
    <?php linkCSS("viewAdvertisementByOwner"); ?>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <div class='row'>
        <div class='column'>
            <div class="polaroid">
                <img src='../../public/assets/img/adUploads/<?php echo $data[4]; ?>' height='490px' width='490px'>
                <div class="container">
                    <p class='imageBottom'> <?php echo $data[3]; ?> Advertisements <br> #<?php echo $data[6]; ?></p>
                </div>
            </div>
        </div>
        <div class='column'>
            <div class="polaroidRightColumn">
                <h1> <?php echo $data[5]; ?> </h1>
                <div class='class1'>Advertisement Description</div>
                <p class='desc'> <br> <?php echo $data[7]; ?> <br> <br> </p>
                <!-- <img src='https://img.icons8.com/fluent/48/000000/price-tag-pound.png' /> -->
                <button class='button2'> The Price - LKR <?php echo $data[12]; ?>.00 </button>
            </div>
            <br><br>
            <div class='link'> <a href="<?php echo BASEURL;?>/advertisements_Controller/updateAdLoad/<?php echo $data[8]; ?>"> Update Advertisement</a>
            </div>
            <div class='link'> <a href="<?php echo BASEURL;?>/advertisements_Controller/deleteAd/<?php echo $data[8]; ?>"> Delete Advertisement</a>
            </div>
        </div>
    </div>
</body>

</html>