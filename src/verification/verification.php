<?php
session_start();
$stateInvalid = "display:none";
$stateAlready = "display:none";
$stateSuccess = "display:none";

$baseURL = "localhost/EXL-Exchange/src/verification/verification.php";

$userName = $_SESSION['userName'];
$accountType = $_SESSION['accoutType'];
$fisrtName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$email = $_SESSION['email'];
$error = "";

// Create OTP Code
$otp=rand ( 1000000 , 9999999 );
$token=md5($otp);
$link=$baseURL."?userName=".$userName."&token=".$token;

//$stateAlready = "";
//Create DB Connection
$db = mysqli_connect('localhost', 'root', '', 'exl_main');

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

//Recipients
$mail->setFrom('exlexchangemail@gmail.com', 'EXL-Exchange');
$mail->addAddress($email, $fisrtName.$lastName);    

// Content
$mail->isHTML(true);                                // Set email format to HTML
$mail->Subject = 'Email Confirmation';
$mail->Body    = "<b> <p style='font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;font-size:18px;'>Welcome to EXL Exchange $fisrtName $lastName ,</b><br>
Please confirm that you want to use this email address as your EXL-Exchange $accountType account email address.<br><br>
<a href='$link'><button style='color: white;padding-left: 40px;padding-right: 40px;padding-bottom: 12px;padding-top: 12px;
border-radius: 5px;border: none;font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
font-weight: 500;font-size: 14px;background-color: #007bff;'>Verify My Email Address</button></a>
<br><br>OR Enter OTP <b><span style='font-size: 16px'>$otp</span></b><br>Thank you for joining with EXL-Exchange.";

$mail->AltBody = "Please confirm that you want to use this as your EXL-Exchange account email addres.Enter OTP $otp ";

if((!isset($_GET['userName']) and !isset($_GET['token']) and !isset($_GET['submit']))or (isset($_GET['resend']) ))
{
    $userCheck = "SELECT * FROM user WHERE userName='$userName' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $userCheck);
    $user = mysqli_fetch_assoc($result);
    if ($user) { 
    if ($user['verificationStatus'] == 0) {
        if($mail->send()){
            //Update DB with OTP
            $query = "UPDATE user SET verificationOTP='$otp' WHERE userName = '$userName' ";
            mysqli_query($db, $query);
        }
        else{
            header('Location: ../errors/505.php');
        }
    }
    else{
        $stateAlready = "";
    }
    }
    else
    {
        header('Location: ../errors/404.php');
    }
}
elseif((isset($_GET['userName']) and isset($_GET['token'])) or isset($_GET['submit']))
{
    $userCheck = "SELECT * FROM user WHERE userName='$userName' LIMIT 1";
    $result = mysqli_query($db, $userCheck);
    $user = mysqli_fetch_assoc($result);
    if ($user) { 
    if ($user['verificationStatus'] == 0) {
        if(isset($_GET['token']))
        {
            if($_GET['token'] == md5($user['verificationOTP'])){
                //Update DB with Status
                $query = "UPDATE user SET verificationStatus=1 WHERE userName = '$userName' ";
                if(mysqli_query($db, $query))
                {
                    $stateSuccess = "";
                }
                else{
                    header('Location: ../errors/505.php');
                }
            }
            else{
                $stateInvalid = "";
                header('Location: '.$_SERVER['PHP_SELF']); 
            }
        }
        if(isset($_GET['pin']))
        {
            if($user['verificationOTP']== $_GET['pin']){
                //Update DB with Status
                $query = "UPDATE user SET verificationStatus=1 WHERE userName = '$userName' ";
                if(mysqli_query($db, $query))
                {
                    $stateSuccess = "";
                }
                else{
                    header('Location: ../errors/505.php');
                }
            }
            else{
                $stateInvalid = "";
                header('Location: '.$_SERVER['PHP_SELF']); 
            }
        }                                                                                                       
    }
    else{
        
        $stateAlready = "";
    }
    }
    else
    {
        header('Location: ../errors/404.php');
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
    <link rel="icon" type="image/png" href="../img/icons/ee-logo.png">
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
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
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
<script type="text/javascript" src="../js/verification.js"></script>
    
</body>
</html>