<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("card"); ?>
    <?php linkFAV("ee-logo.png"); ?>

</head>

<body>
    <input type="checkbox" id="home">
    <header class="header">
        <label for="home"><img src="../img/icons/ee-logo.png" class="home-menu"></label>
        <div class="left-head">Seller<span class="min-text"> Dashboard</span></div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="right-head"><input type="submit" name="logout" value="Log Out" class="head-btn"></div>
    </header>
    <div class="sidebar">
        <center>
            <div class="sidebar-profile-container">
                <a href="#"><img src="uploads/<?php echo $profilePicture ?>" class="sidebar-profile"></a>
            </div>
            <span class="slidbar-name"><?php echo $data[0][0]." ".$data[0][1]; ?></span>
        </center>
        <div class="sidebar-menu">
            <a href="#" class=" selected-item"><img src="../img/icons/icons8-home-144.png"
                    class="sidebar-icons"><span>Home</span></a>
            <a href="#"><img src="../img/icons/icons8-chat-96.png" class="sidebar-icons"><span>Messages</span></a>
            <a href="#"><img src="../img/icons/icons8-submit-resume-96.png " class="sidebar-icons"><span>Current
                    Jobs</span></a>
            <a href="dashboard-create.php"><img src="../img/icons/icons8-plus-math-96.png"
                    class="sidebar-icons"><span>Create Add</span></a>
            <a href="#"><img src="../img/icons/icons8-question-mark-96.png" class="sidebar-icons"><span>Help &
                    Supports</span></a>
            <a href="#"><img src="../img/icons/icons8-complaint-90.png"
                    class="sidebar-icons"><span>Complaints</span></a>
            <a href="#"><img src="../img/icons/icons8-settings-500.png" class="sidebar-icons"><span>Settings</span></a>
        </div>
    </div>
    <div class="content-super">
        <div class="page-container">
            <div class="content">
                <div class="main-title"><span class="blue-text">Current</span> Advertisements</div>
                <div class="advertisements">
                    <?php 
                // $sql = "SELECT * FROM advertisement WHERE userName = '$userName' ";
                // $result = mysqli_query($db, $sql);
                $cardCount = count($data)-1;  
                if ($cardCount > 0) 
                {
                    $i=1;
                    while($i<=$cardCount) {
                        echo "<a href='../advertisements/view-s.php?id=".$data[$i][0]."' style='text-decoration:none;color:black'>
                        <div class='card'>
                            <img src='../img/adUploads/".$data[$i][1]."' class='card-image' />
                            <div class='card-info'>
                                <div class='card-title'>
                                    ".$data[$i][2]."
                                </div>
                                <div class='card-category'>
                                    Category <span class='card-tag'>".$data[$i][3]."</span>
                                </div>
                                <div class='card-feedback'>
                                    Feedbacks <span class='card-feedback-number'>+".$data[$i][4]."</span>
                                </div>
                                <div class='card-rate'>
                                    Rate
                                    <span class='card-rate-number'><img src='../img/icons/icons8-star-96.png'
                                            class='rate-star' />".$data[$i][5]."</span>
                                </div>
                                <div class='card-description'>
                                ".$data[$i][6]."
                                </div>
                            </div>
                            <div class='card-price'>
                                <span class='card-price-tag'>LKR ".$data[$i][7]."</span>
                            </div>
                        </div>
                        </a>
                        ";
                        $i++;
                    }
                }
                ?>
                    <div class="empty-card">
                        <img src="../img/icons/icons8-plus-math-96.png" width="50px" height="50px"
                            style="vertical-align: middle; padding-right: 10px" />
                        Create An Advertisement
                    </div>
                </div>
                <div class="main-title"><span class="blue-text">JOB</span> Requests</div>
                <div class="requests">
                    <div class="request">
                        <span><span class="request-title">Advertisemet ID</span>0215</span>
                        <span><span class="request-title">Advertisement Title</span>I will write quality blog posts, SEO
                            articles, and website content</span>
                        <span><span class="request-title">Buyer Name</span>Nimaya Manthi</span>
                        <span><span class="request-title">Request Status</span>Pending</span>
                        <span><span class="request-title">Expaire Time/Date</span>2020 APR 10 10:30 AM</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>