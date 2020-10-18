
<?php $errors=$data['errors'] ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php linkCSS('register'); ?>
    <?php linkFav('ee-logo.png');?>
</head>

<body>
    <form method="post" action="<?php echo BASEURL.'/login/submit';?>">
        <div class="container">
            <div class="header"><span style="color:#007BFF">Login</span> </div>
            <div class="fieldset">
                <label for="lastname" class="label">User Name</label>
                <input type="text" placeholder="Enter User Name" name="userName" id="userName" autocomplete="off">
                <span class="error"><?php echo $errors["userName"];?></span>
            </div>
            <div class="fieldset">
                <label for="password" class="label">Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off">
                <span class="error"><?php echo $errors["password"];?></span>
            </div>
            <a href="<?php echo BASEURL.'/forgetpw';?>" style="text-decoration:none"><div  class="normal-blue-font">Forgotten Your Username/Password?</div></a>
             <div style="padding-bottom:20px"> <input type="submit" class="registerbtn" value="Login" name="register"></div>
        </div>
    </form>
</body>

</html>