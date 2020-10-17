<?php
    class login extends exlFramework
    {
        public function _constructor()
        {
            start_session();
            $this->helper("linker");
            $this->loginModel = $this->model('loginModel');
        }
        public function index()
        {
            $userName = "";
            $email    = "";
            $errors = array(); 
            $errors["userName"]="";
            $errors["password"]="";
            $data['errors']=$errors;
            $this->helper("linker");
            $this->view("loginView",$data);
            if (isset($_POST['register'])) {
                // Get Data from form
                $userName =  $_POST['userName'];
                $password =  $_POST['password'];
          
                /*--------Form Validation-----------*/
          
          
                //other element validation
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
                   $user = $loginModel->passwordCheck($userName,$password);
                   if ($user) 
                   { 
                          $_SESSION['userName'] = $user['userName'];
                          $user = $loginModel->accountCheck($userName);
                          if ($user) 
                          {
                              $user = $loginModel->buyerCheck($userName);
                              if ($user) {
                                  redirect('buyer/dashboard');
                              }
                              $user = $loginModel->sellerCheck($userName);
                              if ($user) { 
          
                                  redirect('seller/dashboard');
                              }
                          }
                          else
                          {
                              $user = $loginModel->userNameCheck($userName);
                              if ($user['verificationStatus']=='0') 
                              {
                                  $loginModel->deleteUser($userName);
                                  $errors["password"]= "Your Account is Not Verified !";
                              }
                              else if ($user['accountStatus']=='1') {
                                  $errors["password"]= "Your Account is BANNED for 1 Day !";
                              }
                              else if ($user['accountStatus']=='2') {
                                  $errors["password"]= "Your Account is BANNED for 7 Days !";
                              }
                              else if ($user['accountStatus']=='3') {
                                  $errors["password"]= "Your Account is BANNED for 14 Day !";
                              }
                              else if ($user['accountStatus']=='4') {
                                  $errors["password"]= "Your Account is BANNED for 30 Day !";
                              }
                              else if ($user['accountStatus']=='5') {
                                  $errors["password"]= "Your Account is BANNED for 60 day !";
                              }
                              else if ($user['accountStatus']=='6') {
                                  $errors["password"]= "Your Account is BANNED for 365 day !";
                              }
                              else if ($user['accountStatus']=='7') {
                                  $errors["password"]= "Your Account is BANNED for Permanatly !";
                              }
                              else {
                                  $errors["password"]= "Your Account is BLOCKED Contact EXL-Exchange !";
                              }
                          }
                  }
                  else
                  {
                      $errors["password"]= "Invaild Login ! - Wrong User Name OR Password";
                  }    
              }
        }
    }

}

?>