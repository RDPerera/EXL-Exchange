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
   <a href="<?php echo BASEURL.'/allModerators/mod' ?>"><div class="item "><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/current' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplains</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard' ?>"><div class="item " ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplains</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/loadReportView' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div></a>
   <a href="<?php echo BASEURL.'/helpHandle' ?>"><div class="item selected"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png" class="sidebar-icons"><span>Help Responds</span></div></a>
 </nav>
 <br> <br> <br> <br> <br> <br>
 <body>
 <div class="inner-container" style="margin-left:350px;margin-right:50px">
<table>
  <tr>
    <th>ID</th>
    <th>UserName</th>
    <th>E-mail</th>
    <th>Issue Type</th>
    <th>Description</th>
    <th>Attachments</th>
    <th>Status</th>
    <th>Support</th>
    <th></th>
    
  </tr>
<?php 
$result=$data['results'];
foreach ($result as $row){
?>
<td><?php echo $row['ticketId'] ; ?></td>
<td><?php echo $row['userName'] ; ?></td>
<td><?php echo $row['email'] ; ?></td>
<td><?php echo $row['issueType'] ; ?></td>
<td><?php echo $row['description'] ; ?></td>
<td><?php echo $row['attachments'] ; ?></td>

<td>
<form method="post"  action="<?php echo BASEURL.'/helpHandle/attend/'.$row['ticketId'];?>">
<?php echo $row['attendstatus']; ?></td>
<input type="hidden" name="mail" value="<?php echo $row['email'] ; ?>" >
<td><textarea name="solution" id="solution" cols="30" rows="10" class="solution"></textarea></td>
<td><input type="submit" name="submit" class="style" ></td>
</form>
</td>
</tr>
<?php
}
?>
</table>
</html>

