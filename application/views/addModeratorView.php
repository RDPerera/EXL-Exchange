
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php linkCSS('admin-nav'); ?>
  <?php linkFav('ee-logo.png');?>
  <?php linkCSS('add-moderator'); ?>
</head>
<body>
<div class="header">
  <div class="primary">Admin <span>Dashboard</span></div>
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
  	<div class="form-style-10">
		<h1 >Add a <span>Moderator</span></h1>
		<br>
		<div class="section"></div>
		<div class="inner-wrap">
			<form method="post"  action="<?php echo BASEURL.'/addModerator/insert';?>">
				<label for="firstname">First Name: </label>
				<input  type="text" id="firstname" name="firstname" placeholder="Enter the first name">
		</div>
		<br>
		<div class="inner-wrap">
			<label for="last name">Last Name:</label>
			<input type="text" id="lastname" name="lastname" placeholder="Enter the last name">
		</div>
		<br>
		<div class="inner-wrap">
			<label for="E-mail">E-mail:</label>
			<input  type="text" id="E-mail" placeholder="Enter the email" name="email">
		</div>
		<br>
		<div class="inner-wrap">
			<label for="start date">Start Date:</label>
			<input type="date" placeholder="enter the start date" name="startDate" id="startdate">
		</div>
		<br>
		<br>
		<div class="button-section">
			<input type="submit" name="Submit" >
			<input type="reset" value="Clear">
		</div>
		</form>
	</div>
	</div>
</body>
</html>