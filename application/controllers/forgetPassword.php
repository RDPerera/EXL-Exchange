<?php
class forgetPassword extends exlFramework
{
    public function __construct()
    {
        $this->helper('linker');
        $this->helper('mail');
        $this->verificationModel = $this->model('verificationModel');
    }
    public function index()
    {
        $data['stateSuccess'] = "display:none";
        $data['error'] = $error = "";
        $this->view("forgetPasswordView",$data);
    }
    public function submit()
    {
        $data['stateSuccess'] = "display:none";
        $data['error']= "";
        $email = $_POST['email'];
        $user = $this->verificationModel->userCheck($email,$email);
        if ($user) { 
            $token=$user['password'];
            $userName=$user['userName'];
            $fisrtName=$user['firstName'];
            $lastName=$user['lastName'];
            // Create Link 
            $link=BASEURL."/forgetPassword/getNewPasswords?userName=".$userName."&token=".$token;
            // Set email format to HTML
            $Subject = 'Reset Your Password';
            
            $Body= "<b> <p style='font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;font-size:15px;'>Hi $fisrtName ,</b><br>
            No need to worry! You can simply reset your EXL-Exchange account password by clicking the button below:<br><br>
            <a href='$link'><button style='color: white;padding-left: 40px;padding-right: 40px;padding-bottom: 12px;padding-top: 12px;
            border-radius: 5px;border: none;font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 500;font-size: 14px;background-color: #007bff;'>Reset My Password</button></a><br><br>
            <br>If you didn't request a password reset,
            feel free to delete this email and carry on enjoying your secure and unrestricted Internet experience!
            <br><br>All the best,<br>
            The EXL-Exchange";

            $AltBody = "reset password ".$link;
            if(sendMail($email,$fisrtName." ".$lastName,$Subject,$Body,$AltBody)){
                $updatedData=array();
                $updatedData['error']= "";
                $updatedData['stateSuccess'] = "";
                $this->view("forgetPasswordView",$updatedData);
            }
            else{
                $this->view("505");
            }
        }
        else
        {
            $data['error'] = "There are no accounts are attached with that email. ";
            $data['stateSuccess'] = "display:none";
            $this->view("forgetPasswordView",$data);
        }
    }
    public function getNewPasswords()
    {
        $data['stateSuccess'] = "display:none";
        $data['password-error']= "";
        $this->view("resetPasswordView",$data);
    }
    public function reset()
    {
        // Get Data from form
      $password =  $_GET['password'];
      $cpassword = $_GET['cpassword'];

      /*--------Form Validation-----------*/


      //other element validation
      if (empty($cpassword)) { $errors["password"]= "Confirm Your Password"; }
      if (empty($password)) { $errors["password"]= "Password is required"; }
      if ($password != $cpassword) {
        $errors["password"]= "The two passwords are not matched";
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
      /* Quering in buyer/user tables*/
      if ($numberOfErrors== 0) {
         $userCheck = "SELECT * FROM user WHERE userName='$userName' and password='$opassword' LIMIT 1";
         $result = mysqli_query($db, $userCheck);
         $user = mysqli_fetch_assoc($result);
         if ($user) 
         { 
             
            $password=md5($password);
            $update = "UPDATE user SET password ='$password' WHERE userName='$userName' ";
            $result = mysqli_query($db, $update);
            if($result){
                $stateSuccess = "";
            }
            else{
                header('Location: ../errors/505.php');
            }
        }
        else{
            header('Location: ../errors/404.php');
        }    
    }
    else{
        $data['stateSuccess'] = "display:none";
        $data['password-error'] = $errors["password"];
        $this->view("resetPasswordView",$data);
    }
    }
}
?>