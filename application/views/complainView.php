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
    <?php linkCSS('helpSubmit');?>
<style>
    .container{
        width:100%;
        height:100vh;
        display:flex; 
        justify-content:center;  
    }
    .tbl{
        padding:10px;
        align-self:center;
        
    }
    .title
    {
        color: #007bff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: x-large;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .issue,.submit,.description
    {
        padding:10px;
        border-radius: 7px;
        border:none;
        background-color: rgb(238, 238, 238);
    }
    .submit
    {
        float:right;
        padding:10px;
        border-radius: 7px;
        border:none;
        color:white;
        background-color:#007bff ;
        transition: ease-in-out 0.3s;
    }
    .submit:hover{
        color:#007bff;
        background-color:rgb(238, 238, 238) ;
    }
    tr,td{
        padding:10px;
    }
    .success{
        color:green;
        font-weight:600;
    }
    body{
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
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
            <a href="<?php echo BASEURL; ?>/sellerJob/pending"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/pending.png " class="sidebar-icons"><span>Pending Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/active"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/active.png " class="sidebar-icons"><span>Active Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png " class="sidebar-icons"><span>All Job Request</span></a>
            <a href="<?php echo BASEURL; ?>/advertisements_Controller"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-plus-math-96.png" class="sidebar-icons"><span>Create Advertisement</span></a>
            <a href="<?php echo BASEURL; ?>/sellerAnalytics"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Analytics</span></a>
            <a href="<?php echo BASEURL; ?>/helpCenter"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-question-mark-96.png" class="sidebar-icons"><span>Help & Support</span></a>
            <a href="<?php echo BASEURL; ?>/sellerComplaint" class="selected-item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png " class="sidebar-icons"><span>Complaints</span></a>
            </div>
    </div>

<div class="content-super">
    <div class="page-container">
    <form method="post"  action="<?php echo BASEURL.'/complain/insert';?>" enctype="multipart/form-data">
<div class="container">
<input type="hidden" name="complainerUsername" value="<?php echo $data['complainerUsername']; ?>">
<table class="tbl">
    <tr class="srule"><td class="scolumn" colspan="2"><p class="title">Complain Form</p></td></tr>
    <tr class="rule"><td class="column">Issue</td><td class="column2">
        <select name="issue" id="issue" class="issue">
            <option value="Account Issue" class="op" selected>Select complain Type</option>
            <option value="Fraud" class="op">Fraud</option>
            <option value="Abuse" class="op">Abuse</option>
            <option value="Seller Rule Violation" class="op">Seller Rule Violation</option>
			<option value="Buyer Rule Violation" class="op">Buyer Rule Violation</option>
            <option value="Failures" class="op">Failures</option>
        </select>
    </td></tr>
	<tr class="rule"><td class="column">Accuesed UserName</td><td class="column2">
        <input type="text" name="accusedusername" id="accusedusername" class="accusedusername">
    </td></tr>
    <tr class="rule"><td class="column">Descrition</td><td class="column2">
        <textarea name="description" id="description" cols="30" rows="10" class="description"></textarea>
    </td></tr>
	<tr class="rule"><td class="column">Job Id</td><td class="column2">
	<input type="text" name="jobid" id="jobid" class="jobid">
    </td></tr>
	<tr class="rule"><td class="column">Advertisment Id Id</td><td class="column2">
	<input type="text" name="adid" id="adid" class="adid">
    </td></tr>
    <tr class="rule"><td class="column"></td><td class="column2">
	 <input type="submit" name="submit" id="submit" value="Make a complaint" class="submit">
    </td></tr>
</table>
<form>
</div>
</body>
</html>