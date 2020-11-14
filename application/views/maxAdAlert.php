<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement Limit Notifier</title>
    <?php linkSCSS("alert"); ?>
    <?php linkJS("adAlert"); ?>
</head>

<body>
    <?php
    echo "<script>
        alert('You have reached the maximum limit of advertisements you can create.!');
        window.location.href='" . BASEURL . "/sellerdashboard';
     </script>";
    ?>
</body>

</html>