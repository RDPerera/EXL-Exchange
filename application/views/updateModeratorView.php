
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
    <div class="form-style-10">
   <h1 >Update A Moderator</h1>
<form method="post" >
<div class="section">Update Info</div>
		<div class="inner-wrap">
				<label for="firstname">First Name: </label>
				<input type="text" name="firstname" value="<?php echo $data['firstname'] ?>" placeholder="Enter First Name" Required>
		</div>
		<br>
		<div class="inner-wrap">
			<label for="last name">Last Name:</label>
            <input type="text" name="lastname" value="<?php echo $data['lastname'] ?>" placeholder="Enter lastname" Required>
		</div>
		<br>
		<div class="inner-wrap">
			<label for="E-mail">E-mail:</label>
			<input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter email " Required>
		</div>
		<br>
		<div class="inner-wrap">
			<label for="start date">Start Date:</label>
            <input type="date" name="startdate" value="<?php echo $data['startdate'] ?>" placeholder="Enter the date" Required>
		</div>
		<br>
		<br>
		<div class="button-section">
        <input type="submit" name="update" value="Update">
</div>
</form>
</div>
</body>
</html>