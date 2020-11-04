<?php
    class login extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
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
            $this->helper("linker");
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
                              $errors['password']=throwAccountError($userName);
                          }
                  }
                  else
                  {
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
        $user = $this->loginModel->buyerCheck($userName);
        if ($user) {
          $this->redirect('buyerdashboard');
        }
        $user = $this->loginModel->sellerCheck($userName);
        if ($user) { 

          $this->redirect('sellerdashboard');
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
}

?>