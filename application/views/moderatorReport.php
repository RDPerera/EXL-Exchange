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
<div class="header" >
  <div class="primary">Moderator&nbsp<span>Dashboard</span></div>
  <button class="logout" onclick="window.location.href='<?php echo BASEURL.'/adminDashboard/logout' ?>'">Log&nbspOut</button>
</div>
<nav >
   <div class="item-image"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png" class="logo"></div>
   <a href="<?php echo BASEURL.'/allModerators' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/current' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplaints</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard' ?>"><div class="item " ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplaints</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/loadReportView' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/payment' ?>"><div class="item selected" ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div></a>
 </nav><br><br>

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