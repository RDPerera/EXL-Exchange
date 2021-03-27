<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <?php linkFAV("ee-logo.png"); ?>
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("model") ?>
    <?php linkCSS("card"); ?>
    <?php linkCSS("sellerEarnings"); ?>
    <?php linkJS("jquery.min"); ?>
    <?php linkJS("Chart.min"); ?>
    <?php linkJS("sellerEarnings"); ?>
    <?php $additionalData = $data[0][8]; ?>
</head>

<body>
    <!-- To get the username and make it available for the sellerEarnings javascript file -->
    <script type="text/javascript">
        var username = '<?php echo $additionalData['username']; ?>';
    </script>

    <?php include "components/sellerDash.php"; ?>

    <div class="content-super">
        <div class="page-container">
            <div class="content">
                <div class="main-title"><span class="blue-text">Advertisement</span> Performance</div>
                <div class="advertisements">
                    <?php
                    $cardCount = count($data) - 1;
                    if ($cardCount > 0) {
                        $i = 1;
                        while ($i <= $cardCount) {
                            if (!$data[$i][1]) //to check whether user have inserted an advertisement cover or not
                            {
                                $data[$i][1] = 'AdvertisementDefault.jpg'; // if not assign the default image
                            }
                            echo "<a href='" . BASEURL . "/sellerAnalytics/loadStatPage/" . $data[$i][0] . "' style='text-decoration:none;color:black'>
                                <div class='card'>
                                    <img src='" . BASEURL . "/public/assets/img/adUploads/" . $data[$i][1] . "' class='card-image' />
                                    <div class='card-info'>
                                        <div class='card-title'>
                                            " . $data[$i][2] . "
                                        </div>
                                        <div class='card-category'>
                                            Category <span class='card-tag'>" . $data[$i][3] . "</span>
                                        </div>
                                        <div class='card-feedback'>
                                            Feedbacks <span class='card-feedback-number'>+" . $data[$i][4] . "</span>
                                        </div>
                                        <div class='card-rate'>
                                            Rate
                                            <span class='card-rate-number'><img src='" . BASEURL . "/public/assets/img/icons/icons8-star-96.png'
                                                    class='rate-star' />" . $data[$i][5] . "</span>
                                        </div>
                                        <div class='card-description'>
                                        " . $data[$i][6] . "
                                        </div>
                                    </div>
                                    <div class='card-price'>
                                        <span class='card-price-tag'>LKR " . $data[$i][7] . "</span>
                                    </div>
                                </div>
                                </a>
                                ";
                            $i++;
                        }
                    }
                    ?>
                    <a class="nostyle" href="<?php echo BASEURL; ?>/advertisements_Controller">
                        <!--  clear anchor tag styles -->
                        <div class="empty-card">
                            <img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-plus-math-96.png" width="50px" height="50px" style="vertical-align: middle; padding-right: 10px" />
                            Create an Advertisement

                        </div>
                    </a>
                </div>
                <div class="main-title"><span class="blue-text">Earnings</span> Statistics</div>

                <div class="bottom">
                    <div class="bottom-head">
                        <p>Your Earnings</p>
                    </div>
                    <div class="plot">
                        <div class="report-graph">
                            <canvas id="earningsCanvas"></canvas>
                        </div>
                    </div>
                    <div class="textArea">
                        <p>Total Earnings ~
                            <font class="amount">LKR <?php echo $additionalData['total']; ?>.00 </font>
                            <span class="description"><br>Total seller earnings from the creation of the seller account upto today</span>
                        </p>
                        <p>Earnings This Month ~
                            <font class="amount">LKR <?php echo $additionalData['thisMonthTotal']; ?>.00 </font>
                            <span class="description"><br>Seller earnings within this month</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>