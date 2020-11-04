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
        $link=BASEURL."?userName=".$userName."&token=".$token;
        echo sendMail("r.dilanperera@gmail.com","Dilan Perera","test","hello this is test","alt text");
    }
    public function submit()
    {
        
    }
    
}
?>