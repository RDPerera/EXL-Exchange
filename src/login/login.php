
<?php
  /* Session carry the userName , email , accountType */
    session_start();
    $userName = "";
    $email    = "";
    $errors = array(); 
    // DB Connection
    $db = mysqli_connect('localhost', 'root', '', 'exl_main');
    //for form validations initially no errors
    $errors["userName"]="";
    $errors["password"]="";

    if (isset($_POST['register'])) {
      // Get Data from form
      $userName = mysqli_real_escape_string($db, $_POST['userName']);
      $password = mysqli_real_escape_string($db, $_POST['password']);

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
         $userCheck = "SELECT * FROM user WHERE userName='$userName' and password='$password' LIMIT 1";
         $result = mysqli_query($db, $userCheck);
         $user = mysqli_fetch_assoc($result);
         if ($user) 
         { 
                $_SESSION['userName'] = $user['userName'];
                $userCheck = "SELECT * FROM user WHERE userName='$userName' and verificationStatus='1' and accountStatus='0' LIMIT 1";
                $result = mysqli_query($db, $userCheck);
                $user = mysqli_fetch_assoc($result);
                if ($user) 
                {
                    $userCheck = "SELECT * FROM buyer WHERE userName='$userName' LIMIT 1";
                    $result = mysqli_query($db, $userCheck);
                    $user = mysqli_fetch_assoc($result);
                    if ($user) {
                        header('Location: ../buyer/dashboard.php');
                    }
                    $userCheck = "SELECT * FROM seller WHERE userName='$userName' LIMIT 1";
                    $result = mysqli_query($db, $userCheck);
                    $user = mysqli_fetch_assoc($result);
                    if ($user) { 

                        header('Location: ../seller/dashboard.php');
                    }
                }
                else
                {
                    $userCheck = "SELECT * FROM user WHERE userName='$userName' LIMIT 1";
                    $result = mysqli_query($db, $userCheck);
                    $user = mysqli_fetch_assoc($result);
                    if ($user['verificationStatus']=='0') 
                    {
                    $userDelete = "DELETE FROM user WHERE userName='$userName'";
                    $result = mysqli_query($db, $userDelete);
                    $userDelete = "DELETE FROM buyer WHERE userName='$userName'";
                    $result = mysqli_query($db, $userDelete);
                    $userDelete = "DELETE FROM seller WHERE userName='$userName'";
                    $result = mysqli_query($db, $userDelete);
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
        else{
            $errors["password"]= "Invaild Login ! - Wrong User Name OR Password";
        }    
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container">
            <div class="header"><span style="color:#007BFF">Create</span> A New Account</div>
            <div class="fieldset">
                <label for="lastname" class="label">User Name</label>
                <input type="text" placeholder="Enter User Name or Email" name="userName" id="userName" autocomplete="off">
                <span class="error"><?php echo $errors["userName"];?></span>
            </div>
            <div class="fieldset">
                <label for="password" class="label">Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off">
                <span class="error"><?php echo $errors["password"];?></span>
            </div>
              <input type="submit" class="registerbtn" value="Login" name="register">
            </div>
        </div>
    </form>
</body>

</html>
