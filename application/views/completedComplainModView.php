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
  <button style="margin-left:1600px" class="logout" onclick="window.location.href='<?php echo BASEURL.'/adminDashboard/logout' ?>'">Log&nbspOut</button>
</div>
<nav >
   <div class="item-image"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png" class="logo"></div>
   <a href="<?php echo BASEURL.'/allModerators/mod' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-user-resume-96.png" class="sidebar-icons"><span>Moderators</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/current' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Current&nbspcomplaints</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard' ?>"><div class="item selected" ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Completed&nbspcomplaints</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/loadReportView' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Reports</span></div></a>
   <a href="<?php echo BASEURL.'/moderatorDashboard/payment' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-pay-96.png" class="sidebar-icons"><span>Payments</span></div></a>
   <a href="<?php echo BASEURL.'/helpHandle' ?>"><div class="item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png" class="sidebar-icons"><span>Help Responds</span></div></a>
 </nav>
<br><br>
<div class="table-container">
  <p class="title">Accomplished<span> Complaint</span></p>
    <table >
      <tr>
        <th>Complain Id</th>
        <th>Complainant</th>
        <th>Complainee</th>
        <th>Description</th>
        <th>Job Id</th>
        <th>Advertisement ID</th>
        <th>ComplainType</th>
        <th>Action status</th>
        <th>Mod Id</th>
        <th>Admin Id</th>
      </tr>

    <?php $result=$data['results'];
    foreach ($result as $row){?>

    <td><?php echo $row['complainId'] ; ?></td>
    <td><?php echo $row['ComplainerUsername'] ; ?></td>
    <td><?php echo $row['accusedUsername'] ; ?></td>
    <td><?php echo $row['description'] ; ?></td>
    <td><?php echo $row['jobId'] ; ?></td>
    <td><?php echo $row['advertisementId'] ; ?></td>
    <td><?php echo $row['complainType'] ; ?></td>
    <td>
    
      <select name="action" class="special-select">
        <option value="0">No Action</option>
        <option value="1">Account is BANNED for 1 Day</option>
        <option value="2">Account is BANNED for 7 Days</option>
        <option value="3">Account is BANNED for 14 Days</option>
        <option value="4">Account is BANNED for 30 Days</option>
        <option value="5">Account is BANNED for 60 Days</option>
        <option value="6">Account is BANNED for 365 Days</option>
        <option value="7">Account is BANNED for Permanatly</option>
        <option value="8">Account is BLOCKED</option>
      <?php
        if ($row['actionStatus']=='1') {
            echo "<option value='' selected='true'><option value=''>Account is BANNED for 1 Day</option >";
        }
        else if ($row['actionStatus']=='0') {
          echo "<option value='' selected='true'>No Action</option >";
      }
        else if ($row['actionStatus']=='2') {
            echo "<option value='' selected='true'>Account is BANNED for 7 Days</option >";
        }
        else if ($row['actionStatus']=='3') {
            echo "<option value='' selected='true'>Account is BANNED for 14 Days</option >";
        }
        else if ($row['actionStatus']=='4') {
            echo "<option value='' selected='true'>Account is BANNED for 30 Days</option >";
        }
        else if ($row['actionStatus']=='5') {
            echo "<option value='' selected='true'>Account is BANNED for 60 Days</option >";
        }
        else if ($row['actionStatus']=='6') {
            echo "<option value='' selected='true'>Account is BANNED for 365 Days</option >";
        }
        else if ($row['actionStatus']=='7') {
            echo "<option value='' selected='true'>Account is BANNED for Permanatly</option >";
        }
        else {
            echo "<option value='8' selected='true'>Account is BLOCKED<option >";
        }  
    ?>
    </select>
  </td>
    <td><?php echo $row['modId'] ; ?></td>
    <td><?php echo $row['adminId'] ; ?></td>
    
    </tr>
    <?php } ?>
    </table>
    </div>
    </body>
    </html>

