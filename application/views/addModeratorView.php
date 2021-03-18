
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php linkCSS('admin-nav'); ?>
  <?php linkFav('ee-logo.png');?>
  <?php linkCSS('view'); ?>
  <?php linkCSS('add-moderator'); ?>
</head>
<body>
<div class="header" >
  <div class="primary">Admin&nbsp<span>Dashboard</span></div>
  <button class="logout" onclick="window.location.href='<?php echo BASEURL.'/adminDashboard/logout' ?>'" >Log&nbspOut</button>
</div>
<nav >
   <div class="item-image"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png" class="logo"></div>
   <a href="<?php echo BASEURL.'/adminDashboard/addModerator' ?>"><div class="item selected"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Add Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/deleteModerator' ?>"><div class="item "><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Manage Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard/current' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplains</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard' ?>"><div class="item" ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplains</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div></a>
   <a href="<?php echo BASEURL.'/adminDashboard' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div></a>
 </nav>
 <br>
 <br>
  	<div class="form-style-10">
	  <p class="title">Add<span> Moderator</span></p>
		<br>
		<div class="section"></div>
		<div class="inner-wrap">
			<form method="post"  action="<?php echo BASEURL.'/adminDashboard/insert';?>">
				<label for="firstname">First Name: </label>
				<input  type="text" id="firstname" name="firstname" >
		</div>
		<br>
		<div class="inner-wrap">
			<label for="last name">Last Name:</label>
			<input type="text" id="lastname" name="lastname" >
		</div>
		<div class="inner-wrap">
			<label for="username">User Name</label>
			<input type="text" id="username" name="username" >
		</div>
		<div class="inner-wrap">
			<label for="E-mail">E-mail:</label>
			<input  type="text" id="E-mail"  name="email">
		</div>
		<div class="inner-wrap">
			<label for="start date">DOB</label>
			<input type="date"  name="startDate" id="startdate">
		</div>
		<div class="inner-wrap">
			<label for="start date">Password</label>
			<input type="password"  name="password" id="password">
		</div>
		<div class="button-section">
			<input type="submit" name="Submit" >
		</div>
		</form>
	</div>
	</div>
</body>
</html>