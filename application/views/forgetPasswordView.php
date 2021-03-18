<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <?php linkCSS('verification'); ?>
    <?php linkCSS('model'); ?>
    <?php linkFav('ee-logo.png');?> 
    <?php 
    $stateSuccess = $data['stateSuccess'];
    $error=$data['error'];

    ?>
    
</head>
<body> 

<div id="model" class="model-background" style="<?php echo $stateSuccess ?>">
    <div class="model-content">
        <div class="model-header"><span class="model-header-content">Reset Informations Sent !</span></div>
        <div class="model-text v-h-center">Your Password Reset Informations Sent Successfully <br> Check You E-mail</div>
        <button id="model-btn" class="model-button"> Go To Login Page</button>
    </div>
</div>
<form method="post" action="<?php echo BASEURL.'/forgetPassword/submit';?>">  
    <div class="container">
        <div class="header"><span style="color:#007BFF;font-size:20px">Reset Your Password</span></div>
        <div class="fieldset">
            <label for="pin" class="label">Enter Your Email To Get Account Password Resetting Informations </label>
            <input type="email" placeholder="Email" name="email" id="pin">
            <span class="error"><?php echo $error;?></span>
        </div>
        <div class="fieldset">
        <input type="submit" class="registerbtn" value="Send Password Reset Information" name="submit">
        </div>
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