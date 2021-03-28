<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php linkCSS('admin-nav'); ?>
    <?php linkCSS('view'); ?>
    <?php linkCSS('adminReport'); ?>
    <?php linkFav('ee-logo.png'); ?>
    <?php linkJS("jquery.min"); ?>
    <?php linkJS("Chart.min"); ?>
    <?php linkJS('revenueGraph'); ?>

</head>

<body>

    <?php include "components/adminDashboard.php"; ?>

    <div class="mainContainer">
        <div class="top">
            <div class="topHead">
                <p>Revenue Statistics</p>
            </div>
            <div class="plot">
                <canvas id="revenueCanvas"></canvas>
            </div>
            <div class="description">
                <p>Revenue This Month ~
                    <font class="amount">LKR <?php echo number_format((float)$data['thisMonthTotal'], 2, '.', ''); ?> </font>
                    <span class="amt_text"><br>Total revenue earned in this month</span>
                </p>
                <p>Average Revenue ~
                    <font class="amount">LKR <?php echo number_format((float)$data['avgRevenue'], 2, '.', ''); ?> </font>
                    <span class="amt_text"><br>Current EXL Exchange average revenue per month</span>
                </p>
            </div>

        </div>
        <div class="bottom">
            <div class="topHead">
                <p>Web Traffic Analytics</p>
            </div>
            <div class="plot1">
                <canvas id="byCountryCanvas"></canvas>
            </div>
            <div class="plot2">
                <canvas id="visitorCanvas"></canvas>
            </div>
            <div class="descBottom">

            <!-- code the backend of this -->
            <p>Visitor total ~
                    <font class="amount"><?php echo (int)$data['totalVisitors']; ?> </font>
                    <span class="amt_text2"><br>Total visitors this month</span>
                </p>
                <p>Average visitors ~
                    <font class="amount"><?php echo (int)$data['avgVisitors']; ?> </font>
                    <span class="amt_text2"><br>Current average visitors per day</span>
                </p>
            </div>
        </div>
    </div>

</body>

</html>