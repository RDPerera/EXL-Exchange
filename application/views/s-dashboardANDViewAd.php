<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("viewAdvertisementByOwner"); ?>
    <?php linkFAV("ee-logo.png"); ?>
</head>

<body>
    <?php include "components/sellerDash.php"; ?>

    <div class="content-super">
        <div class="page-container">
            <div class="content">
                <div class="main-title"><span class="blue-text">My</span> Advertisements</div>
                <div class='row'>
                    <div>
                        <div class='column'>
                            <div class="polaroid">
                                <img src='../../public/assets/img/adUploads/<?php echo $data[4]; ?>' height='590px' width='590px'>
                                <div class="container">
                                    <p class='imageBottom'> <?php echo $data[3]; ?> Advertisements <br> #<?php echo $data[6]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class='column'>
                            <div class="polaroidRightColumn">
                                <h1> <?php echo $data[5]; ?> </h1>
                                <div class='class1'>Advertisement Description</div>
                                <p class='desc'> <br> <?php echo $data[7]; ?> <br> <br> </p>
                                <!-- <img src='https://img.icons8.com/fluent/48/000000/price-tag-pound.png' /> -->
                                <button class='button2'> The Price - LKR <?php echo $data[12]; ?>.00 </button>
                            </div>
                            <br><br>
                            <div class='adView'> <a class='adViewLink' href="<?php echo BASEURL; ?>/advertisements_Controller/updateAdLoad/<?php echo $data[0]; ?>"> Update Advertisement</a>
                            </div>
                            <div class='adView'> <a class='adViewLink' href="<?php echo BASEURL; ?>/advertisements_Controller/deleteAd/<?php echo $data[0]; ?>" onclick="return confirm('Are you sure you want to delete the advertisement?')"> Delete Advertisement</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>