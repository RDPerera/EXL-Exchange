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
  <div class="primary">Admin&nbsp<span>Dashboard</span></div>
  <button class="logout">Log&nbspOut</button>
</div>
<nav >
   <div class="item-image"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png" class="logo"></div>
   <a href="<?php echo BASEURL.'/adminDashboard/addModerator' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Add Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/deleteModerator' ?>"><div class="item selected"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Manage Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard/current' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplains</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard' ?>"><div class="item" ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplains</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard/loadReportView' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div></a>
   <a href="<?php echo BASEURL.'/helpHandle' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png" class="sidebar-icons"><span>Help Responds</span></div></a>
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
    <td style="background-color: #007bff;">Edit</td>
    <td style="background-color: #007bff;"> Delete</td>
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
<td><a href="<?php echo BASEURL.'/updateModerator/update/'.$row['userName']; ?>"> <button type="button" class="deletebutton">Update</button></a></td>
<td><a href="<?php echo BASEURL.'/deleteModerator/delete/'.$row['userName']; ?>"><button type="button" class="deletebutton">Delete</button></a></td>
</tr>
<?php
}
?>
</table>
</div>
