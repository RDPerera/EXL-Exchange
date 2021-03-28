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
  <button class="logout" style="margin-left:1600px"  onclick="window.location.href='<?php echo BASEURL.'/adminDashboard/logout' ?>'">Log&nbspOut</button>
</div>
<nav >
  <div class="item-image"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png" class="logo"></div>
   <a href="<?php echo BASEURL.'/allModerators' ?>"><div class="item selected"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/current' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplains</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard' ?>"><div class="item " ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplains</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard/loadReportView' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div></a>
 </nav>
 <br>
 <br>
<body>
    <h1> Manage <span> Moderator</span> </h1>
  <div class="inner-container" style="margin-left:350px;margin-right:50px">
<table >
  <tr style="background-color: #007bff;color:white">
    <td style="background-color: #007bff;">Moderator</td>
    <td style="background-color: #007bff;">First name</td>
    <td style="background-color: #007bff;">Last name</td>
    <td style="background-color: #007bff;">E mail</td>
    <td style="background-color: #007bff;">Start Date</td>
  </tr>
 <?php 
$result=$data['results'];
foreach ($result as $row){
?>
<td><?php echo $row['userName'] ; ?></td>
<td><?php echo $row['firstName'] ; ?></td>
<td><?php echo $row['lastName'] ; ?></td>
<td><?php echo $row['email'] ; ?></td>
<td><?php echo $row['stsrtDate'] ; ?></td>
</tr>
<?php
}
?>
</table>
</div>
