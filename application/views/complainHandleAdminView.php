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
  <div class="primary"><span>Admin</span> <span>Dashboard</span></div>
  <button class="logout">Log Out</button>
</div>
<nav >
   <a ><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png" class="logo"></div></a>
   <a href="<?php echo BASEURL.'/addModerator' ?>"><div class="item selected"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Add Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/addModerator' ?>"><div class="item selected"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Delete/Update&nbspModerator</span></div></a>
   <a href="#second"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplains</span></div></a>
   <a href="#second"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplains</span></div></a>
   <a href="#third"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div></a>
   <a href="#fourth"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div></a>
 </nav>
 <br>
 <br>


   <h1>Current<span> Complains</span></h1>
<table>
  <tr>
    <th>Complain<br>Id</th>
    <th>Complainant</th>
    <th>Complainee</th>
    <th>Description</th>
    <th>JobId</th>
    <th>Advertisement<br>ID</th>
    <th>Complain<br>Type</th>
    <th>Action<br> status</th>
    <th>Mod Id</th>
    
  </tr>
<?php 
$result=$data['results'];
foreach ($result as $row){
?>
<td><?php echo $row['complainId'] ; ?></td>
<td><?php echo $row['complainerUsername'] ; ?></td>
<td><?php echo $row['accusedUsername'] ; ?></td>
<td><?php echo $row['description'] ; ?></td>
<td><?php echo $row['jobId'] ; ?></td>
<td><?php echo $row['advertisementID'] ; ?></td>
<td><?php echo $row['complainType'] ; ?></td>
<td><form method="post"  action="<?php echo BASEURL.'/complainHandleAdmin/approve/'.$row['complainId'];?>">
<?php echo "<input type='text' value='".$row['actionStatus']."' name='action'>"; ?></td>
<td><?php echo $row['modId'] ; ?>
<br>
<input type="submit" name="submit" class="style" >

</td>
</form>
</td>
</tr>
<?php
}
?>
</table>
</html>

