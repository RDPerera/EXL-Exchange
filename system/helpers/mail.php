<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($to,$toName,$subject,$body,$altBody)
{
    // Load Composer's autoloader
    require '../vendor/autoload.php';

    // Instantiation of the PHPMailer
    $mail = new PHPMailer(true);


    //Server settings

    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'exlexchangemail@gmail.com';                  
    $mail->Password   = 'exl@1234';                              
    $mail->SMTPSecure = "tls";        
    $mail->Port       = 587;
    $mail->setFrom('exlexchangemail@gmail.com', 'EXL-Exchange');
    $mail->addAddress($to, $toName);
    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $altBody;


    if($mail->send()){
        return true;
    }
    else{
        return false;
    } 
}
?>