<?php

class advertisements_Controller extends exlFramework
{

  public function __construct()
  {
    $this->helper("linker");
    $this->advertisements_model = $this->model('advertisements_model');
  }

  public function index()
  {
    $this->view("dashboardCreate");
  }

  public function formInput()
  {

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
      }

      if (empty($_POST["category"])) {
        $errorData['categoryErr'] = "* Category is required";
        $ValidationErrors++;
      }

      if (empty($_POST["tag"])) {
        $errorData['tagErr'] = "* Tag is required";
        $ValidationErrors++;
      }

      if (empty($_POST["content"])) {
        $errorData['contentErr']  = "* Content is required";
        $ValidationErrors++;
      }

      if (empty($_POST["status"])) {
        $errorData['statusErr'] = "* Status is required";
        $ValidationErrors++;
      }

      if (empty($_POST["price"])) {
        $errorData['priceErr'] = "* Price is required";
        $ValidationErrors++;
      }
    }

    if ($ValidationErrors == 0) { //there are no validation errors

      if (isset($_POST['fsubmit'])) {

        //retrieveing user entered data from the form
        $title = $this->input('title');
        $category = $this->input('category');
        $tag = $this->input('tag');
        $content = $this->input('content');
        $status = $this->input('status');
        $price = $this->input('price');
        $member1 = $this->input('member1');
        $member2 = $this->input('member2');
        $member3 = $this->input('member3');
        $date = date('Y-m-d H:i:s'); //getting the current data and time


        //taking an image as the user input and storing it
        $target_dir = "../public/assets/img/adUploads/";
        $uploadOk = 0;
        $image = "";
        if (!empty($_FILES["imageupload"]["name"])) //if an image is selected
        {
          $filename = $_FILES["imageupload"]["name"];
          $target_file = $target_dir . basename($_FILES["imageupload"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        }

        //if there were no errors
        if ($uploadOk == 1) {
          move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_file); //move the image file to the target location
        }

        if (!empty($_FILES["imageupload"]["name"])) //only if an image is selected
        {
          $timestamp = time();
          $image = $userName . $timestamp . "." . $imageFileType; //generating an unique name to the image file
          rename("../public/assets/img/adUploads/$filename", "../public/assets/img/adUploads/$image"); //adding the generated name to the file
        }

        $this->advertisements_model->store($date, $status, $category, $image, $title, $tag, $content, $userName, $member1, $member2, $member3, $price);
        $this->redirect("advertisements_Controller");
        // $complete = "";
      }
    } else { //there are validation errors
      $this->view("dashboardCreate", $errorData);
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


  public function showAd($adID)
  {
    $row = $this->advertisements_model->retrieve($adID);
    $this->view("view-s", $row);
  }

  public function deleteAd($username)
  {
    $this->advertisements_model->delete($username);
  }
}
