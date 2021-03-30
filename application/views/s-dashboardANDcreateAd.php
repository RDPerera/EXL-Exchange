<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php linkFAV("ee-logo.png"); ?>
    <?php linkCSS("sdashboard"); ?>
    <?php linkCSS("sdashboard-create-ad") ?>
    <?php linkCSS("model") ?>
    <?php linkJS("sdashboard-create") ?>
</head>

<body>
<input type="checkbox" id="home">
    <header class="header">
        <label for="home"><img src='<?php echo BASEURL; ?>/public/assets/img/icons/ee-logo.png' class="home-menu"></label>
        <div class="left-head">Seller<span class="min-text"> Dashboard</span></div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="right-head"><input type="submit" name="logout" value="Log Out" class="head-btn"></div>
</form>
    </header>
    <div class="sidebar">
        <center>
            <div class="sidebar-profile-container">
                <a href="<?php echo BASEURL; ?>/sellerDashboard/loadChangeDPView"><img src="<?php echo BASEURL; ?>/public/assets/img/userImages/<?php if ($data[2]) {
                                                                                                                                                    echo $data[2];
                                                                                                                                                } else {
                                                                                                                                                    echo "pp_default.jpg";
                                                                                                                                                } ?>" class="sidebar-profile"></a>
            </div>
            <span class="slidbar-name"><?php echo $data[0] . " " . $data[1]; ?></span>
        </center>
        <div class="sidebar-menu">
            <a href="<?php echo BASEURL; ?>/sellerDashboard" ><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-home-144.png" class="sidebar-icons "><span>Home</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/pending"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/pending.png " class="sidebar-icons"><span>Pending Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob/active"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/active.png " class="sidebar-icons"><span>Active Jobs</span></a>
            <a href="<?php echo BASEURL; ?>/sellerJob"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-submit-resume-96.png " class="sidebar-icons"><span>All Job Request</span></a>
            <a href="<?php echo BASEURL; ?>/advertisements_Controller" class="selected-item"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-plus-math-96.png" class="sidebar-icons"><span>Create Advertisement</span></a>
            <a href="<?php echo BASEURL; ?>/sellerAnalytics"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-report-96.png" class="sidebar-icons"><span>Analytics</span></a>
            <a href="<?php echo BASEURL; ?>/helpCenter"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-question-mark-96.png" class="sidebar-icons"><span>Help & Support</span></a>
            <a href="<?php echo BASEURL; ?>/sellerComplaint"><img src="<?php echo BASEURL; ?>/public/assets/img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Complaints</span></a>
    </div>
    </div>

    <div class="content-super">
        <div class="sub-container">
            <div class="main-title-create"><span class="blue-text-create">Create </span>Advertisement</div>
            <form action="<?php echo BASEURL; ?>/advertisements_Controller/formInput" method="post" name="createAdForm" enctype="multipart/form-data">

                <div class="fieldset">
                    <label> Enter the title </label>
                    <input type="text" name="title">
                    <span class="error"><?php if(!empty($data['titleErr'])) : echo $data['titleErr']; endif; ?></span>
                </div>
                <div class="fieldset">
                    <label> Select the category </label>
                    <select name="category">
                        <option>
                            Graphics Designing
                        </option>
                        <option>
                            Programming
                        </option>
                        <option>
                            Content Writing
                        </option>
                        <option>
                            Other
                        </option>
                    </select>
                    <span class="error"><?php if(!empty($data['categoryErr'])) : echo $data['categoryErr']; endif; ?></span>

                </div>

                <div class="fieldset">
                    <label> Upload an image </label> &nbsp &nbsp &nbsp
                    <label class="browsebtn">
                        <input type="file" name="imageupload" id="imageupload" class="createbtn">
                        Browse
                    </label>

                </div>
                <br>
                <div class="fieldset">
                    <label for='radio'> Advertisement Status </label>
                    <span class="sub-set">
                        <input type="radio" id="active" name="status" value="active">
                        <label for="active">Active</label>
                        <input type="radio" id="inactive" name="status" value="inactive">
                        <label for="inactive">Inactive</label>
                    </span>
                    <span class="error"> <?php if(!empty($data['statusErr'])) : echo $data['statusErr']; endif; ?></span>
                </div>
                <div class="fieldset">
                    <label>Enter a search tag </label>
                </div>
                <div class="fieldset">
                    <input type="text" name="tag">
                    <span class="error"> <?php if(!empty($data['tagErr'])) : echo $data['tagErr']; endif; ?></span>
                    <div>
                        <br>
                        <div class="fieldset">
                            <label>Advertisement Content</label><br>
                            <textarea name="content"></textarea>
                            <span class="error"> <?php if(!empty($data['contentErr'])) : echo $data['contentErr']; endif; ?></span>
                        </div>
                        <div class="fieldset">
                            <label>Enter the price</label>
                            <input type="text" name="price" placeholder="The Price In Srilankan Rupees">
                            <span class="error"> <?php if(!empty($data['priceErr'])) : echo $data['priceErr']; endif; ?> </span>

                        </div>
                        <div class="addcollabrators">Add Collaborators
                            <span class="colbtn" onclick="add()">+</span>
                            <span class="colbtn-" onclick="remove()">-</span>
                        </div>
                        <div id="field1" class="mem-fieldset" style="display:none">
                            <label> Group member 01 </label>
                            <input type="text" name="member1" class="member" placeholder="Enter the EXL Exchange username of the first member">
                        </div>
                        <div id="field2" class="mem-fieldset" style="display:none">
                            <label> Group member 02 </label>
                            <input type="text" name="member2" class="member" placeholder="Enter the EXL Exchange username of the second member">
                        </div>
                        <div id="field3" class="mem-fieldset" style="display:none">
                            <label> Group member 03 </label>
                            <input type="text" name="member3" class="member" placeholder="Enter the EXL Exchange username of the third member">
                        </div>

                        <input type="submit" name="fsubmit" value="Create" class="createbtn">
            </form>
        </div>
    </div>

    <!-- <script>
    // Get the modal and button
    var modal1 = document.getElementById("model1");
    // When the user clicks on button close,it will close the modal
    function dispose() {
        modal1.style.display = "none";
        window.location.replace("../seller/dashboard.php");
    };
    </script> -->

</body>

</html>