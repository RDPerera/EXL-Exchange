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
<body>
    <h1>Update / Delete<span> Moderator</span> </h1>
<table >
  <tr>
    <td>id</td>
    <td>first name</td>
    <td>last name</td>
    <td>E mail</td>
    <td>start date</td>
    <td>edit</td>
    <td>delete</td>
  </tr>
 <?php 
$result=$data['results'];
foreach ($result as $row){
?>
<td><?php echo $row['id'] ; ?></td>
<td><?php echo $row['firstname'] ; ?></td>
<td><?php echo $row['lastname'] ; ?></td>
<td><?php echo $row['email'] ; ?></td>
<td><?php echo $row['startdate'] ; ?></td>
<td><a href="<?php echo BASEURL.'/updateModerator/update/'.$row['id']; ?>"> <button type="button" class="deletebutton">Update</button></a></td>
<td><a href="<?php echo BASEURL.'/deleteModerator/delete/'.$row['id']; ?>"><button type="button" class="deletebutton">Delete</button></a></td>
</tr>
<?php
}
?>
</table>

