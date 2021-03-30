<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php linkCSS('admin-nav'); ?>
  <?php linkFav('ee-logo.png');?>
  <?php linkCSS('view'); ?>
</head>
<body>
<div class="header" >
  <div class="primary">Moderator&nbsp<span>Dashboard</span></div>
  <button class="logout" onclick="window.location.href='<?php echo BASEURL.'/adminDashboard/logout' ?>'">Log&nbspOut</button>
</div>
<nav >
   <div class="item-image"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png" class="logo"></div>
   <a href="<?php echo BASEURL.'/allModerators/mod' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/current' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplaints</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard' ?>"><div class="item " ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplaints</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/loadReportView' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/payment' ?>"><div class="item selected" ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div></a>
   <a href="<?php echo BASEURL.'/helpHandle' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png" class="sidebar-icons"><span>Help Responds</span></div></a>
 </nav>
<br><br>
<div class="table-container">
  <p class="title">Payment<span> From The Buyers</span></p>
    <table >
      <tr>
        <th>Payument Id</th>
        <th>Type</th>
        <th>Date</th>
        <th>Time</th>
        <th>Job Id</th>
        <th>Advertisement ID</th>
        <th>Buyer</th>
        <th>Total Amount</th>
        <th>Profit</th>
        <th>Net Amount</th>
      </tr>

    <?php $result=$data['results'];
    foreach ($result as $row){?>

    <td><?php echo $row['paymentID'] ; ?></td>
    <td><?php echo $row['type'] ; ?></td>
    <td><?php echo $row['date'] ; ?></td>
    <td><?php echo $row['time'] ; ?></td>
    <td><?php echo $row['jobID'] ; ?></td>
    <td><?php echo $row['adID'] ; ?></td>
    <td><?php echo $row['buyer'] ; ?></td>
    <td><?php echo $row['totalAmount'] ; ?></td>
    <td><?php echo $row['exlAmount'] ; ?></td>
    <td><?php echo $row['sellerAmount'] ; ?></td>
    </tr>
    <?php } ?>
    </table>
    <a href="#">Processs payments for last 7 days</a>
    </div>
    </body>
    </html>

