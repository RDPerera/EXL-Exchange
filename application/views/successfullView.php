<!DOCTYPE html>
<html lang="en">
<?php linkCSS('help'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfull</title>
    <style>
        .container{
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .success{
            color:green;
            font-weight:600;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .im{
            margin-left:35px;
        }
        .backbtn{
            color:white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width:250px;
        }
    </style>
</head>
<body>
    <div class="container">
    <img class="im" width="200px" src="<?php echo BASEURL.'/public/assets/img/icons/success.png';?>" alt="img">
    <p class='success'>Help Request Successfully Completed!</p>
    <a style="text-decoration: none;" href="<?php echo BASEURL.'/helpCenter' ?>"><div class="backbtn"><< Back To Help Center</div></a>
    </div>
</body>
</html>