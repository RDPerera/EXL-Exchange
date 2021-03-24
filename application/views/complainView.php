<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("card"); ?>
	<?php linkFAV("ee-logo.png"); ?>
	<?php linkCSS('add-moderator'); ?>
	<?php $jobs=$data['joblist'];?>
    <?php $data=$data['memory'];?>
</head>

<body>
    <input type="checkbox" id="home">
    <header class="header">
        <label for="home"><img src='<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png' class="home-menu"></label>
        <div class="left-head">Seller<span class="min-text"> Dashboard</span></div>
        <form method="post" action="<?php echo BASEURL.'/sellerDashboard/logout'; ?>">
            <div class="right-head"><input type="submit" name="logout" value="Log Out" style="margin-top:0px" class="head-btn"></div></form>
    </header>
    <div class="sidebar">
        <center>
            <div class="sidebar-profile-container">
                <a href="<?php echo BASEURL;?>/sellerDashboard/loadChangeDPView"><img src="<?php echo BASEURL; ?>/public/assets/img/userImages/<?php if ($data[0][2]) {
                                                                                                echo $data[0][2];
                                                                                            } else {
                                                                                                echo "pp_default.jpg";
                                                                                            } ?>" class="sidebar-profile"></a>
            </div>
            <span class="slidbar-name"><?php echo $data[0][0] . " " . $data[0][1]; ?></span>
        </center>
        <div class="sidebar-menu">
            <a href="<?php echo BASEURL; ?>/sellerDashboard" ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-home-144.png" class="sidebar-icons "><span>Home</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-chat-96.png" class="sidebar-icons"><span>Messages</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/pending"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/pending.png " class="sidebar-icons"><span>Pending Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/active"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/active.png " class="sidebar-icons"><span>Active Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png " class="sidebar-icons"><span>All Job Request</span></a>
            <a href="<?php echo BASEURL; ?>/advertisements_controller"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-plus-math-96.png" class="sidebar-icons"><span>Create Advertisement</span></a>
            <a href="<?php echo BASEURL; ?>/sellerAnalytics"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Analytics</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-question-mark-96.png" class="sidebar-icons"><span>Help & Support</span></a>
            <a href="<?php echo BASEURL; ?>/sellercomplaint" class="selected-item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Complaints</span></a>
            <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-settings-500.png" class="sidebar-icons"><span>Settings</span></a></div>
    </div>

<div class="content-super">
    <div class="page-container">
  	<div class="form-style-10">
		<h1 >Complain Form</h1>
		<div class="inner-wrap">
			<form method="post"   action="<?php echo BASEURL.'/sellerComplaint/insert';?>"> 
				<label style='display:none' for="complain User">Complainant: </label>
				<input style='display:none' type="text" id="complainUser" name="complainUser" value="<?php echo $data[0][8]; ?>" >
		</div>
		<br>
		<div class="inner-wrap "  class="<?php echo BASEURL.'/complain/selectad';?>">
			<label for="accuseduser">Complainee:</label>
			<input type="text" placeholder="Enter User Name" name="complainee" id="complainee">
        </select>
		</div>
		<br>
		<div class="inner-wrap">
			<label for="complainType">Complain Type</label>
			<br>
			<br>
            <select id="complainType" name="complainType" class="dropdown" style="color:white;box-shadow:0 0 2px #333">
                <option value = "Fraud">Fraud</option>
                <option value = "Abuse">Abuse</option>
                <option value = "Seller rule violation">Seller rule violation</option>
				<option value = "Failures">Failures</option>
				<option value = "Buyer rule violation">Buyer rule violation</option>
              	</select>
		</div>
		<br>
        <div class="inner-wrap">
			<label for="description">Description:</label>
			<br>
			<textarea style="background-color:#F2F2F2;border:none;border-radius:5px;width:580px" name="description" id="description" cols="30" rows="10"></textarea>
		</div>
		<br>
		
		<div class="inner-wrap">
		<div class="button-section">
			<input type="submit" name="submit" >
		</div>
																						</div>
		</form>
	    </div>
	</div>
	</div>

</div>
</body>

</html>