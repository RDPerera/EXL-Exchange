<?php
    class login extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->helper("log");
            $this->helper("mail");
            $this->loginModel = $this->model('loginModel');
        }
        public function index()
        {
            /*Initially No errors*/
            $userName = "";
            $email    = "";
            $errors = array(); 
            $errors["userName"]="";
            $errors["password"]="";
            $data['errors']=$errors;
            $this->view("loginView",$data);
           
        }
        public function submit()
        {
            $errors = array(); 
            $errors["userName"]="";
            $errors["password"]="";
            if (isset($_POST['register'])) {
                // Get Data from form
                $userName =  $_POST['userName'];
                $password =  $_POST['password'];
                /*--------Form Validation-----------*/

                if (empty($userName)) { $errors["userName"]="User Name is required"; }
                if (empty($password)) { $errors["password"]= "Password is required"; }
                
                /* Number of validation failures */
                $numberOfErrors=0;
                foreach ($errors as $key => $value)
                {
                  if($value!="")
                  {
                      $numberOfErrors++;
                  }
                }
                /* Quering in buyer/user tables*/
                if ($numberOfErrors== 0) {
                   $password = md5($password);
                   
                   $user = $this->loginModel->passwordCheck($userName,$password);
                   if ($user) 
                   {
                          $this->setSession('userName',$userName);
                          $user = $this->loginModel->accountCheck($userName);
                          if ($user) 
                          {
                              $this->linkDashboard($userName); //if account login suucessfull redirect to dashboard
                          }
                          else
                          {
                              $errors['password']=$this->throwAccountError($userName);
                          }
                  }
                  else
                  {
                      logAccessDenied($userName);
                      $errors["password"]= "Invaild Login ! - Wrong User Name OR Password";
                  }  
                  
              }
              /* Regenerate Login Page With Errors */
              $data['errors']=$errors;
              $this->view("loginView",$data);
        }
        
    }
    /* Redirect user to relevent dashboard */
    private function linkDashboard($userName)
    {
        
        $this->loginModel->setOnline($userName);
        $user = $this->loginModel->buyerCheck($userName);
        if ($user) {
          logBuyerAccess($userName);
          $this->redirect('buyerDashboard');
        }
        $user = $this->loginModel->sellerCheck($userName);
        if ($user) { 
            logSellerAccess($userName);
            $this->notify($userName);
            $this->redirect('sellerDashboard');
        }
        $user = $this->loginModel->adminCheck($userName);
        if ($user) { 
            $this->notify($userName);
            logAdminAccess($userName);
            $this->redirect('adminDashboard');
        }
        $user = $this->loginModel->moderatorCheck($userName);
        if ($user) { 
            $this->notify($userName);
            logModeratorAccess($userName);
            $this->redirect('moderatorDashboard');
        }
    }
    /* return the reson to login failure*/
    private function throwAccountError($userName)
    {
        $user = $this->loginModel->userNameCheck($userName);
        if ($user['verificationStatus']=='0') 
        {
            $this->loginModel->deleteUser($userName);
            return "Your Account is Not Verified !";
        }
        else if ($user['accountStatus']=='1') {
            return "Your Account is BANNED for 1 Day !";
        }
        else if ($user['accountStatus']=='2') {
            return "Your Account is BANNED for 7 Days !";
        }
        else if ($user['accountStatus']=='3') {
            return "Your Account is BANNED for 14 Day !";
        }
        else if ($user['accountStatus']=='4') {
            return "Your Account is BANNED for 30 Day !";
        }
        else if ($user['accountStatus']=='5') {
            return "Your Account is BANNED for 60 day !";
        }
        else if ($user['accountStatus']=='6') {
            return "Your Account is BANNED for 365 day !";
        }
        else if ($user['accountStatus']=='7') {
            return "Your Account is BANNED for Permanatly !";
        }
        else {
            return "Your Account is BLOCKED Contact EXL-Exchange !";
        }
    }
    private function notify($userName)
    {
        $user = $this->loginModel->userNameCheck($userName);
        if ($user) { 
            $token=$user['password'];
            $email=$user['email'];
            $userName=$user['userName'];
            $fisrtName=$user['firstName'];
            $lastName=$user['lastName'];
            // Create Link 
            $link=BASEURL."/forgetPassword/getNewPasswords?userName=".$userName."&token=".$token;
            // Set email format to HTML
            $Subject = 'Logged in Alert- EXL-Exchange';
            
            $Body= "<b> <p style='font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;font-size:15px;'>Hi $fisrtName ,</b><br>
            You are logged in to your EXL-Exchange Account.
            <br><br>
            If this is not you,You can reset your EXL-Exchange account password by clicking
            <a href='$link'> here. </a><br><br>
            <br>
            The EXL-Exchange";

            $AltBody = "You are logged in to your account ,if not reset password ".$link;
            sendMail($email,$fisrtName." ".$lastName,$Subject,$Body,$AltBody);
        }
    }
}

?>