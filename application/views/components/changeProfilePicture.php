<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change the profile picture</title>
    <?php linkCSS('register'); ?>
    <?php linkFav('ee-logo.png');?> 
</head>

<body>
    <form method="post" action="<?php echo BASEURL.'/login/submit';?>">
        <div class="container">
            <div class="header"><span style="color:#007BFF">Change the Profile Picture</span> </div>
            <div class="fieldset">
                <label for="lastname" class="label">User Name</label>
                <input type="text" placeholder="Enter User Name" name="userName" id="userName" autocomplete="off">
                <span class="error"><?php echo $errors["userName"];?></span>
            </div>

            <label> Upload an image </label> &nbsp &nbsp &nbsp
                <label class="custom-file-upload">
                    <input type='file' name='imageUpload' id='imageUpload'>
                    Browse
            </label>
             <div style="padding-bottom:20px"> <input type="submit" class="registerbtn" value="Login" name="register"></div>
        </div>
    </form>
</body>

</html>