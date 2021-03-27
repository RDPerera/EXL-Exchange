<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Responce</title>
    <?php $adData = $data[0][8]; ?>
    <?php $ClicksRequests = $data[0][9]; ?>
    <?php linkCSS('adPerformance'); ?>
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("card"); ?>
    <?php linkFAV("ee-logo.png"); ?>
    <?php linkJS("jquery.min"); ?>
    <?php linkJS("Chart.min"); ?>
    <?php linkJS("clicksGraph"); ?>

</head>

<body>

    <!-- To get the advertisement ID and make it avaible for the clicksGraph javascript file -->
    <script type="text/javascript">
        var adID = <?php echo $adData['advertisementID']; ?>;
    </script>

    <?php include "components/sellerDash.php"; ?>

    <div class="content-super">
        <div class="grid-container">
            <div class="ad">
                <div class="header1">
                    <div class="report-head">
                        <p>The Advertisement Information</p>
                    </div>
                </div>
                <div class="imag">
                    <div class="img-container"><img src="<?php echo adIMG($adData['image']) ?>" class="addImg"></div>
                </div>
                <div class="title">
                    <p><?php echo $adData['title']; ?></p>
                    <div class="rating">
                        <div class="ad-rating">
                            <span class='feed-container'><?php echo "LKR " . $adData['price'] . ".00"; ?></span>
                            <span class='category-container'><?php echo "Category : " . $adData['category']; ?></span>
                            <span class='rate-container'><img src="<?php echo icoIMG('icons8-star-96.png') ?>" class='ratingIcon'>
                                <span class='rating'><?php echo $adData['rate'] . " | Feedbacks " . $adData['feedbacks']; ?></span></span>
                            <span class='status-container'><?php echo "Status : " . $adData['status']; ?></span>
                        </div>
                    </div>
                </div>

                <div class="content1">
                    <div class="content"><?php echo $adData['content'] ?></div>
                </div>
                <div class="right">
                    <p>The RCR Value ~ <?php echo $ClicksRequests['rcr']; ?>%<span class='rcr'><br>The Request - Click Ratio measures the proportion of individuals who clicks an seller advertisement and subsequently requests it.</span></p>

                </div>
            </div>

            <div class="report">
                <div class="report-head">
                    <p>Advertisement Views</p>
                </div>
                <div class="report-graph">
                    <canvas id="clicksCanvas"></canvas>
                </div>
            </div>

            <div class="report">
                <div class="report-head">
                    <p>Job Requests</p>
                </div>
                <div class="report-graph">
                    <canvas id="requestsCanvas"></canvas>
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>

</body>

</html>