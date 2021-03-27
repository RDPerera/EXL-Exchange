<div class="header">
    <div class="primary">Admin&nbsp<span>Dashboard</span></div>
    <button class="logout" onclick="window.location.href='<?php echo BASEURL . '/adminDashboard/logout' ?>'">Log&nbspOut</button>
</div>
<nav>
    <div class="item-image"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png" class="logo"></div>
    <a href="<?php echo BASEURL . '/adminDashboard/addModerator' ?>">
        <div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Add Moderators</span></div>
    </a>
    <a href="<?php echo BASEURL . '/deleteModerator' ?>">
        <div class="item "><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Manage Moderators</span></div>
    </a>
    <a href="<?php echo BASEURL . '/adminDashboard/current' ?>">
        <div class="item selected"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplaints</span></div>
    </a>
    <a href="<?php echo BASEURL . '/adminDashboard' ?>">
        <div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplaints</span></div>
    </a>
    <a href="<?php echo BASEURL . '/adminDashboard' ?>">
        <div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div>
    </a>
    <a href="<?php echo BASEURL . '/adminDashboard' ?>">
        <div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div>
    </a>
</nav>
<br><br>
