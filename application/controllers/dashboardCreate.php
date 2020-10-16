<?php

class dashboardCreate extends exlFramework
{
 

  public function __construct()
  {

    $this->helper("linker");
  
    // $this->dashboardCreateModel = $this->model('testModel'); 


  }

  public function index()
  {
    $this->view("dashboardCreate");
  }

  public function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  public function formHandling()
  {

    //   $this->testModel->func('23','34');

    // session_start();
    // $complete = "display:none";
    // $userName = $_SESSION['userName'];
    $userName = "chathura";

    //form validation 

    $errorData = [

      'titleErr' => '',
      'userNameErr' => '',
      'categoryErr' => '',
      'tagErr' => '',
      'contentErr' => '',
      'statusErr' => '',
      'priceErr' => '',
  
     ];
    
    $title = $category = $tag = $content = $status = $price = "";

    $ValidationErrors = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['logout'])) {
      if (empty($_POST["title"])) {
        $errorData['titleErr'] = "* Title is required";
        $ValidationErrors++;
      } else {
        $title = test_input($_POST["title"]);
      }

      if (empty($_POST["category"])) {
        $errorData['categoryErr'] = "* Category is required";
        $ValidationErrors++;
      } 

      if (empty($_POST["tag"])) {
        $errorData['tagErr'] = "* Tag is required";
        $ValidationErrors++;
      } else {
        $tag = test_input($_POST["tag"]);
      }

      if (empty($_POST["content"])) {
        $errorData['contentErr']  = "* Content is required";
        $ValidationErrors++;
      } else {
        $content = test_input($_POST["content"]);
      }

      if (empty($_POST["status"])) {
        $errorData['statusErr'] = "* Status is required";
        $ValidationErrors++;
      } else {
        $status = test_input($_POST["status"]);
      }

      if (empty($_POST["price"])) {
        $errorData['priceErr'] = "* Price is required";
        $ValidationErrors++;
      } else {
        $price = test_input($_POST["price"]);
      }
    }


    if ($ValidationErrors == 0) { //there are no validation errors

      if (isset($_POST['fsubmit'])) { //retrieveing user entered data from the form

        

        //   $title = mysqli_real_escape_string($db, $_POST['title']);
        //   $category = mysqli_real_escape_string($db, $_POST['category']);
        //   $status = mysqli_real_escape_string($db, $_POST['status']);
        //   $tag = mysqli_real_escape_string($db, $_POST['tag']);
        //   $content = mysqli_real_escape_string($db, $_POST['content']);
        //   $member1 = mysqli_real_escape_string($db, $_POST['member1']);
        //   $member2 = mysqli_real_escape_string($db, $_POST['member2']);
        //   $member3 = mysqli_real_escape_string($db, $_POST['member3']);
        //   $price = mysqli_real_escape_string($db, $_POST['price']);
        //   $date = date('Y-m-d H:i:s'); //getting the current data and time


        //   //taking an image as the user input and storing it
        //   $target_dir = "../img/adUploads/";
        //   $uploadOk = 0;
        //   $image = "";
        //   if (!empty($_FILES["imageupload"]["name"])) //if an image is selected
        //   {
        //     $filename = $_FILES["imageupload"]["name"];
        //     $target_file = $target_dir . basename($_FILES["imageupload"]["name"]);
        //     $uploadOk = 1;
        //     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        //   }

        //   //if there were no errors
        //   if ($uploadOk == 1) {
        //     move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_file); //move the image file to the target location
        //   }

        //   if (!empty($_FILES["imageupload"]["name"])) //only if an image is selected
        //   {
        //     $timestamp = time();
        //     $image = $userName . $timestamp . "." . $imageFileType; //generating an unique name to the image file
        //     rename("../img/adUploads/$filename", "../img/adUploads/$image"); //adding the generated name to the file
        //   }

        //   $query = "INSERT INTO advertisement (dateTime,status,category,image,title,tag,content,userName,member1,member2,member3,price) VALUES ('$date','$status', '$category','$image' , '$title' , '$tag' ,'$content' , '$userName' , '$member1' , '$member2' , '$member3','$price')";
        //   mysqli_query($db, $query);
        //   $complete = "";
        // }
      }


      // $userCheck = "SELECT * FROM user WHERE userName='$userName' LIMIT 1";
      // $result = mysqli_query($db, $userCheck);
      // $user = mysqli_fetch_assoc($result);
      // if ($user) {
      //   $firstName = $user['firstName'];
      //   $lastName = $user['lastName'];
      //   $profilePicture = $user['profilePicture'];
      //   $dob = $user['dob'];
      //   $email = $user['email'];
      //   $userCheck = " SELECT * FROM seller WHERE userName='$userName' LIMIT 1 ";
      //   $result = mysqli_query($db, $userCheck);
      //   $user = mysqli_fetch_assoc($result);
      //   $mainRate = $user['mainRate'];
      //   $communicationRate = $user['communicationRate'];
      //   $deliveringRAte = $user['deliveringRate'];
      // } else {
      //   header('Location: ../login/login.php');
      // }
      // if (isset($_POST['logout'])) {
      //   session_destroy();
      //   header('Location: ../login/login.php');
      // }
    }
    else{ //there are validation errors
      $this->view("dashboardCreate", $errorData);
    }
  }

}
