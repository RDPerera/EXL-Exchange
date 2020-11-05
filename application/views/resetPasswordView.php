<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php linkCSS('register'); ?>
    <?php linkCSS('model'); ?>
    <?php linkFav('ee-logo.png');?>
    <?php 
    $stateSuccess = $data['stateSuccess'];
    $errors=$data['password-error'];
    ?>
</head>

<body>
<div id="model" class="model-background" style="<?php echo $stateSuccess ?>">
    <div class="model-content">
        <div class="model-header"><span class="model-header-content">Successful Password Reset!</span></div>
        <div class="model-text v-h-center">Your Password  Reset  Successfully!</div>
        <button id="model-btn" class="model-button"> Go To Login Page</button>
    </div>
</div>
    <form method="get" action="<?php echo BASEURL.'/forgetPassword/reset';?>">
        <div class="container">
            <div class="header"><span style="color:#007BFF">Reset Passsword</span> </div>
            <div class="fieldset">
                <label for="password" class="label">New Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off">
                
            </div>
            <div class="fieldset">
                <label for="password" class="label">Confirm Password</label>
                <input type="password" placeholder="Enter Password" name="cpassword" id="password" autocomplete="off">
                <span class="error"><?php echo $errors;?></span>
            </div>
             <div style="padding-bottom:20px"> <input type="submit" class="registerbtn" value="Reset" name="reset"></div>
        </div>
    </form>

    <script>
    var modal = document.getElementById("model");
    var btn = document.getElementById("model-btn");
    btn.onclick = function () {
    modal.style.display = "none";
    window.location.replace("http://localhost/EXL-Exchange/login");
    };

    </script>
</body>

</html>
