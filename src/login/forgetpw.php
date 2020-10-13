<?php
session_start();
$stateSuccess = "display:none";

$baseURL = "localhost/EXL-Exchange/src/login/resetpw.php";

$error = "";



//$stateAlready = "";
//Create DB Connection
$db = mysqli_connect('localhost:3308', 'root', '', 'exl_main');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation of the PHPMailer
$mail = new PHPMailer(true);


//Server settings

//$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for debugging
$mail->isSMTP();                                            
$mail->Host       = 'smtp.gmail.com';                    
$mail->SMTPAuth   = true;                                   
$mail->Username   = 'exlexchangemail@gmail.com';                  
$mail->Password   = 'exl@1234';                              
$mail->SMTPSecure = "tls";        
$mail->Port       = 587;      



if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $userCheck = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $userCheck);
    $user = mysqli_fetch_assoc($result);
    if ($user) { 
        $token=$user['password'];
        $userName=$user['userName'];
        $fisrtName=$user['firstName'];
        $lastName=$user['lastName'];
        // Create Link 
        $link=$baseURL."?userName=".$userName."&token=".$token;
        //Recipients
        $mail->setFrom('exlexchangemail@gmail.com', 'EXL-Exchange');
        $mail->addAddress($email, $fisrtName.$lastName);    

        // Content
        $mail->isHTML(true);                                // Set email format to HTML
        $mail->Subject = 'Reset Your Password';
        
        $mail->Body    = "<b> <p style='font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;font-size:15px;'>Hi $fisrtName ,</b><br>
        No need to worry! You can simply reset your EXL-Exchange account password by clicking the button below:<br><br>
        <a href='$link'><button style='color: white;padding-left: 40px;padding-right: 40px;padding-bottom: 12px;padding-top: 12px;
        border-radius: 5px;border: none;font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;font-size: 14px;background-color: #007bff;'>Reset My Password</button></a><br><br>
        <br>If you didn't request a password reset,
         feel free to delete this email and carry on enjoying your secure and unrestricted Internet experience!
         <br><br>All the best,<br>
         The EXL-Exchange";

        $mail->AltBody = "reset password ".$link;
        if($mail->send()){
            $stateSuccess = "";
        }
        else{
            header('Location: ../errors/505.php');
        }
    }
    else
    {
        $error = "There are no accounts are attached with that email. ";
    }
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" type="text/css" href="../css/model.css">
    <link rel="stylesheet" type="text/css" href="../css/verification.css">
    
</head>
<body> 

<div id="model" class="model-background" style="<?php echo $stateSuccess ?>">
    <div class="model-content">
        <div class="model-header"><span class="model-header-content">Reset Informations Sent !</span></div>
        <div class="model-text v-h-center">Your Password Reset Informations Sent Successfully <br> Check You E-mail</div>
        <button id="model-btn" class="model-button"> Go To Login Page</button>
    </div>
</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
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
window.location.replace("http://localhost/EXL-Exchange/src/login/login.php");
};

</script>
</body>
</html>