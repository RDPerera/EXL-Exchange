
<?php
  /* Session carry the userName , email , accountType */
    session_start();
    $userName = "";
    $email    = "";
    $errors = array(); 
    // DB Connection
    $db = mysqli_connect('localhost:3308', 'root', '', 'exl_main');
    //for form validations initially no errors
    $errors["userName"]="";
    $errors["firstname"]="";
    $errors["lastname"]="";
    $errors["dob"]="";
    $errors["password"]="";
    $errors["email"]="";
    $errors["agreement"]="";

    if (isset($_POST['register'])) {
      // Get Data from form
      $userName = mysqli_real_escape_string($db, $_POST['userName']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password_1 = mysqli_real_escape_string($db, $_POST['password']);
      $password_2 = mysqli_real_escape_string($db, $_POST['passwordRepeat']);
      $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
      $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
      $dob=mysqli_real_escape_string($db, $_POST['dob']);

      /*Form Validation*/
      /*===============*/

      //user agreement sigining status
      if(isset($_POST['agreement'])){$agreement = 1;}else{$agreement = 0;}

      //other element validation
      if (empty($userName)) { $errors["userName"]="userName is required"; }
      if ($agreement==0) { $errors["agreement"]="You need to agree the Terms and Privacy"; }
      if (empty($email)) { $errors["email"]="Email is required"; }
      if (!empty($email)){if(strcmp(substr($email,-6),".ac.lk")!=0){$errors["email"]="Email must be an University Email";}}
      if (empty($firstName)) { $errors["firstname"]="First Name is required"; }
      if (empty($lastName)) { $errors["lastname"]="Last Name is required"; }
      if (empty($dob)) { $errors["dob"]= "Date Of Birth is required"; }
      if (empty($password_1)) { $errors["password"]= "Password is required"; }
      if ($password_1 != $password_2) {
        $errors["password"]= "The two passwords are not matched";
      }
      $userCheck = "SELECT * FROM user WHERE userName='$userName' OR email='$email' LIMIT 1";
      $result = mysqli_query($db, $userCheck);
      $user = mysqli_fetch_assoc($result);
      if ($user) { 
        if ($user['userName'] === $userName) {
            $errors["userName"]= "userName already exists";
        }
        if ($user['email'] === $email) {
            $errors["email"]= "email already exists";
        }
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
          $password = md5($password_1);
          $query = "INSERT INTO user (userName,firstName,lastName,dob,email,accountStatus,verificationStatus,verificationOTP,password) 
                    VALUES('$userName', '$firstName', '$lastName','$dob','$email',0,0,0,'$password')";
          mysqli_query($db, $query);
          $query = "INSERT INTO seller(userName,mainRate,communicationRate,deliveringRate)
          VALUES('$userName',0,0,0)";
          mysqli_query($db, $query);
          $_SESSION['userName'] = $userName;
          $_SESSION['accoutType'] = "Seller";
          $_SESSION['email']=$email;
          $_SESSION['firstName']=$firstName;
          $_SESSION['lastName']=$lastName;
          header('Location: ../verification/verification.php');
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
    <link rel="icon" type="image/png" href="../img/icons/ee-logo.png">
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container">
            <div class="header"><span style="color:#007BFF">Create</span> A New Seller Account</div>
            <div class="fieldset">
                <label for="firstName" class="label">First Name</label>
                <input type="text" placeholder="Enter First Name" name="firstName" id="firstName" autocomplete="off">
                <span class="error"><?php echo $errors["firstname"];?></span>
            </div>
            <div class="fieldset">
                <label for="lastname" class="label">Last Name</label>
                <input type="text" placeholder="Enter Last Name" name="lastName" id="lastName" autocomplete="off">
                <span class="error"><?php echo $errors["lastname"];?></span>
            </div>
            <div class="fieldset">
                <label for="lastname" class="label">User Name</label>
                <input type="text" placeholder="Pick a User Name" name="userName" id="userName" autocomplete="off">
                <span class="error"><?php echo $errors["userName"];?></span>
            </div>
            <div class="fieldset">
                <label for="dob" class="label">Date Of Birth</label>
                <input type="date" placeholder="Enter DOB" name="dob" id="dob" autocomplete="off">
                <span class="error"><?php echo $errors["dob"];?></span>
            </div>
            <div class="fieldset">
                <label for="email" class="label">University Student Email Address</label>
                <input type="email" placeholder="Enter Email" name="email" id="email" autocomplete="off">
                <span class="error"><?php echo $errors["email"];?></span>
            </div>
            <div class="fieldset">
                <label for="password" class="label">Crate New Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off">
            </div>
            <div class="fieldset">
                <label for="passwordRepeat" class="label">Confirm Your Password</label>
                <input type="password" placeholder="Confirm Password" name="passwordRepeat" id="passwordRepeat" autocomplete="off">
                <span class="error"><?php echo $errors["password"];?></span>
            </div>
            <div class="fieldset">
              <p class="agreement-condition">
                  <input type="checkbox" name="agreement" id="agreement" value="1">I agree to company <a href="#">Terms &
                      Privacy</a>.
                  <span class="error"><?php echo $errors["agreement"];?></span>
              </p>
              <input type="submit" class="registerbtn" value="Register" name="register">
            </div>
        </div>
    </form>
</body>

</html>

