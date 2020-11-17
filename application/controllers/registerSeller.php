<?php
    class registerSeller extends exlFramework
    {
        public function __construct()
        {
            $this->helper("linker");
            $this->registerModel = $this->model('registerSellerModel');
        }
        public function initiate()
        {
            $errors = array(); 
            $errors["userName"]="";
            $errors["firstname"]="";
            $errors["lastname"]="";
            $errors["dob"]="";
            $errors["password"]="";
            $errors["email"]="";
            $errors["agreement"]="";
            return $errors;
        }
        public function index()
        {
            /*Initially No errors*/
            $data['errors']=$this->initiate();
            $this->helper("linker");
            $this->view("registerSellerView",$data);
        }

        public function submit()
        {
            $data['errors']=$errors=$this->initiate();

            if (isset($_POST['register'])) {
                // Get Data from form
                $userName = $_POST['userName'];
                $email = $_POST['email'];
                $password_1 = $_POST['password'];
                $password_2 = $_POST['passwordRepeat'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $dob=$_POST['dob'];
                if(isset($_POST['agreement'])){$agreement = 1;}else{$agreement = 0;}//user agreement sigining status
    
                /*Form Validation*/
                /*===============*/
                //other element validation
                if (empty($userName)) { $errors["userName"]="userName is required"; }
                if ($agreement==0) { $errors["agreement"]="You need to agree the Terms and Privacy"; }
                if (empty($email)) { $errors["email"]="Email is required"; }
                if (!empty($email)){if(strcmp(substr($email,-6),".ac.lk")!=0){$errors["email"]="Email must be an University Email";}}
                if (empty($firstName)) { $errors["firstname"]="First Name is required"; }
                if (empty($lastName)) { $errors["lastname"]="Last Name is required"; }
                if (empty($dob)) { $errors["dob"]= "Date Of Birth is required"; }
                if (empty($password_1)) { $errors["password"]= "Password is required"; }
                if ($password_1 != $password_2) {$errors["password"]= "The two passwords are not matched";}
                if ($this->registerModel->userNameCheck($userName)) {$errors["userName"]= "userName already exists";}
                if ($this->registerModel->emailCheck($email)) {$errors["email"]= "email already exists";}
    
                }
          
                /* Number of validation failures */
                $numberOfErrors=0;
                foreach ($errors as $key => $value)
                {
                  if($value!="")
                  {
                      $numberOfErrors++;
                  }
                }
                /* Quering in seller/user tables*/
                if ($numberOfErrors== 0) {
                    $this->registerModel->addSeller($userName,$firstName,$lastName,$dob,$email,md5($password_1));
                    $this->setSession('userName',$userName);
                    $this->setSession('accoutType',"Seller");
                    $this->setSession('email',$email);
                    $this->setSession('firstName',$firstName);
                    $this->setSession('lastName',$lastName);
                    $this->redirect('verification');
                }
                /* Regenerate Login Page With Errors */
                $data['errors']=$errors;
                $this->view("registerSellerView",$data);
        }
}

?>