
<?php
session_start();
    $stateSuccess = "display:none";
    $errors = array(); 
    // DB Connection
    $db = mysqli_connect('localhost', 'root', '', 'exl_main');
    //for form validations initially no errors
    $errors["userName"]="";
    $errors["password"]="";
    if (isset($_GET['userName']) && isset($_GET['token'])) {
    $_SESSION['userName']=$_GET['userName'];
    $_SESSION['password']=$_GET['token'];

    }
    if (isset($_GET['reset'])) {
      // Get Data from form
      $password = mysqli_real_escape_string($db, $_GET['password']);
      $cpassword = mysqli_real_escape_string($db, $_GET['cpassword']);

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
            
         $opassword= $_SESSION['password'];
         $userName= $_SESSION['userName'];

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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/model.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>

<body>
<div id="model" class="model-background" style="<?php echo $stateSuccess ?>">
    <div class="model-content">
        <div class="model-header"><span class="model-header-content">Successful Password Reset!</span></div>
        <div class="model-text v-h-center">Your Password  Reset  Successfully!</div>
        <button id="model-btn" class="model-button"> Go To Login Page</button>
    </div>
</div>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container">
            <div class="header"><span style="color:#007BFF">Reset Passsword</span> </div>
            <div class="fieldset">
                <label for="password" class="label">New Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off">
                
            </div>
            <div class="fieldset">
                <label for="password" class="label">Confirm Password</label>
                <input type="password" placeholder="Enter Password" name="cpassword" id="password" autocomplete="off">
                <span class="error"><?php echo $errors["password"];?></span>
            </div>
             <div style="padding-bottom:20px"> <input type="submit" class="registerbtn" value="Reset" name="reset"></div>
        </div>
    </form>

    <script>
    var modal = document.getElementById("model");
    var btn = document.getElementById("model-btn");
    btn.onclick = function () {
    modal.style.display = "none";
    window.location.replace("http://localhost/EXL-Exchange/src/login/login.php");
    };

    </script>
</body>

</html>
