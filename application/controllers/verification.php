<?php
class verification extends exlFramework
{
    public function __construct()
    {
        $this->helper('linker');
        $this->helper('mail');
        $this->verificationModel = $this->model('verificationModel');
    }
    public function index()
    {
        $data['stateInvalid'] = "display:none";
        $data['stateAlready'] = "display:none";
        $data['stateSuccess'] = "display:none";
        /* Get Session DATA */
        $userName = $this->getSession('userName');
        $accountType = $this->getSession('accoutType');
        $fisrtName = $this->getSession('firstName');
        $lastName = $this->getSession('lastName');
        $data['email'] = $email = $this->getSession('email');
        
        $data['error'] = $error = "";
        $this->view("verificationView",$data);
        // Create OTP Code
        $otp=rand ( 1000000 , 9999999 );
        $token=md5($otp);
        $link=BASEURL."/verification/submit?userName=".$userName."&token=".$token;
        
        //messaege body and subject
        $subject="Email Confirmation";
        $Body = "<b><p style='font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;font-size:18px;'>Welcome to EXL Exchange $fisrtName $lastName ,</b><br>
        Please confirm that you want to use this email address as your EXL-Exchange $accountType account email address.<br><br>
        <a href='$link'><button style='color: white;padding-left: 40px;padding-right: 40px;padding-bottom: 12px;padding-top: 12px;
        border-radius: 5px;border: none;font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;font-size: 14px;background-color: #007bff;'>Verify My Email Address</button></a>
        <br><br>OR Enter OTP <b><span style='font-size: 16px'>$otp</span></b><br>Thank you for joining with EXL-Exchange.";
        $AltBody = "Please confirm that you want to use this as your EXL-Exchange account email addres.Enter OTP $otp ";
        
        // SEND Verification E-Mail
        if((!isset($_GET['userName']) and !isset($_GET['token']) and !isset($_GET['submit']))or (isset($_GET['resend']) ))
        {
            $user = $this->verificationModel->userCheck($userName,$email);
            if ($user) { 
            if ($user['verificationStatus'] == 0) {
                if(sendMail($email,$fisrtName." ".$lastName,$subject,$Body,$AltBody)){
                    //Update DB with OTP
                    $this->verificationModel->updateOTP($userName,$otp);
                }
                else{
                    $this->view("505");
                }
            }
            else{
                $data["stateAlready"] = "";
            }
            }
            else
            {
                $this->view("404");
            }
        }
        
    }
    public function submit()
    {
        $data['stateInvalid'] = "display:none";
        $data['stateAlready'] = "display:none";
        $data['stateSuccess'] = "display:none";

       /* Get Session DATA */
        $userName = $this->getSession('userName');
        $accountType = $this->getSession('accoutType');
        $fisrtName = $this->getSession('firstName');
        $lastName = $this->getSession('lastName');
        $data['email'] = $email = $this->getSession('email');
        $data['error'] = $error = "";

        //Check Verivication Code
        if((isset($_GET['userName']) and isset($_GET['token'])) or isset($_GET['submit']))
        {
            $user = $this->verificationModel->userCheck($userName,$email);
            if ($user) { 
                
            if ($user['verificationStatus'] == 0) {
                if(isset($_GET['token']))
                {
                    if($_GET['token'] == md5($user['verificationOTP'])){ //Check Verivication Code Via LINK
                        //Update DB with Status
                        if($this->verificationModel->updateVerification($userName))
                        {
                            $data['stateSuccess'] = "";
                            $this->view("verificationView",$data); 
                        }
                        else{$this->view("505");}
                    }
                    else{
                        $data["stateInvalid"] = "";
                        $this->view("verificationView",$data); 
                    }
                }
                if(isset($_GET['pin']))//Check Verivication Code Via PIN
                {
                    if($user['verificationOTP']== $_GET['pin']){
                        //Update DB with Status
                        if($this->verificationModel->updateVerification($userName))
                        {
                            $data['stateSuccess'] = "";
                            $this->view("verificationView",$data); 
                        }
                        else{
                            $this->view("505");
                        }
                    }
                    else{
                        $data["stateInvalid"] = "";
                        $this->view("verificationView",$data); 
                    }
                }                                                                                                       
            }
            else{
                $data["stateAlready"] = "";
                $this->view("verificationView",$data); 
            }
            }
            else{$this->view("404");}
        }
    }
    
}
?>