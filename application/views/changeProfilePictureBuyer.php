<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change the profile picture</title>
    <?php linkCSS('changePP'); ?>
    <?php linkFav('ee-logo.png'); ?>
</head>
<body>
    <form method="post" action="<?php echo BASEURL;?>/buyerdashboard/handleThePicture" name="profilePictureForm" enctype="multipart/form-data"> 
        <div class="container">
            <div class="header"><span style="color:#007BFF">Change the Profile Picture</span> </div>
            <label class="custom-file-upload">
                    <input type='file' name='imageUpload' id='imageUpload'>
                    Browse
                </label>
            <input type="submit" class="savebtn" value="Upload The Image" name="saveButton">
        </div>
    </form>
</body>

</html>