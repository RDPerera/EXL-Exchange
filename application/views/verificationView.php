<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <?php linkCSS('verification'); ?>
    <?php linkCSS('model'); ?>
    <?php linkFav('ee-logo.png');?> 
    <?php 
    $stateInvalid = $data['stateInvalid'];
    $stateAlready = $data['stateAlready'];
    $stateSuccess = $data['stateSuccess'];
    $email=$data['email'];
    $error=$data['error'];
    ?>
</head>
<body> 
<div id="model1" class="model-background" style="<?php echo $stateInvalid ?>">
    <div class="model-content">
        <div class="model-header"><span class="model-header-content">Invalid Verification</span></div>
        <div class="model-text v-h-center">Your One Time Password Is Incorrect !</div>
        <button id="model-btn-1" class="model-button"> OK </button>
    </div>
</div>
<div id="model2" class="model-background" style="<?php echo $stateAlready ?>">
    <div class="model-content">
        <div class="model-header"><span class="model-header-content">Already Registared</span></div>
        <div class="model-text v-h-center">You Are Already Registered. Please LogIn !</div>
        <button id="model-btn-2" class="model-button" > Login </button>
    </div>
</div>
<div id="model3" class="model-background" style="<?php echo $stateSuccess ?>">
    <div class="model-content">
        <div class="model-header"><span class="model-header-content">Registration Successfull</span></div>
        <div class="model-text v-h-center">Your Registration Process Is Successfull</div>
        <button id="model-btn-3" class="model-button"> Go To Dashboard</button>
    </div>
</div>
<form method="get" action="<?php echo BASEURL.'/verification/submit';?>">  
    <div class="container">
        <div class="header"><span style="color:#007BFF;font-size:20px">Check Your Email </span></div>
        <div class="fieldset">
            <label for="pin" class="label">Verification email sent to <?php echo $email ?>.</br>Enter the OTP code to verfy the account</label>
            <input type="text" placeholder="OTP Code" name="pin" id="pin">
            <span class="error"><?php echo $error;?></span>
        </div>
        <div class="fieldset">
        <input type="submit" class="resendbtn" value="Resend" name="resend" id="resendbtn">
        <input type="submit" class="registerbtn" value="Complete Registration" name="submit">
        </div>
    </div>
</form>
<?php linkJS('verification') ?>
    
</body>
</html>