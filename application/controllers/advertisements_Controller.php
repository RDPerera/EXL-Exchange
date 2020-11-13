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
    
    $row = [

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
        $row['titleErr'] = "* Title is required";
        $ValidationErrors++;
      }

      if (empty($_POST["category"])) {
        $row['categoryErr'] = "* Category is required";
        $ValidationErrors++;
      }

      if (empty($_POST["tag"])) {
        $row['tagErr'] = "* Tag is required";
        $ValidationErrors++;
      }

      if (empty($_POST["content"])) {
        $row['contentErr']  = "* Content is required";
        $ValidationErrors++;
      }

      if (empty($_POST["status"])) {
        $row['statusErr'] = "* Status is required";
        $ValidationErrors++;
      }

      if (empty($_POST["price"])) {
        $row['priceErr'] = "* Price is required";
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
      $this->view("dashboardCreate", $row);
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

  private function getExistingData($username)
  {
       //get the ad data using the username 
       $row = $this->advertisements_model->getDataByUsername($username);
       $options = "";
       $optionArray = array("Graphics Designing", "Programming", "Content Writing");
   
       //to handle the select tag (to retrieve data from database and display in the page)
       if ($row[3] == $optionArray[0]) {
         $options = "<option selected>$row[3]</option><option>$optionArray[1]</option><option>$optionArray[2]</option>";
       } else if ($row[3] == $optionArray[1]) {
         $options = "<option>$optionArray[0]</option><option selected>$optionArray[1]</option><option>$optionArray[2]</option>";
       } else {
         $options = "<option>$optionArray[0]</option><option>$optionArray[1]</option><option selected>$optionArray[2]</option>";
       }
       $row[13] = $options;
   
       //to handle the radio button (to retrieve data from database and display in the page)
       $row[14] = $row[15] = $activeCheck = $inactiveCheck = "";
       if ($row[2] == "active") {
         $activeCheck = "checked";
         $row[14] = $activeCheck;
       } else {
         $inactiveCheck = "checked";
         $row[15] = $inactiveCheck;
       }

       return $row;
  }

  public function updateAdLoad($username) //function that is used to retrieve the existing values of the ad from the database to the view
  {
    $row = $this->getExistingData($username);
    $this->view("updateAd", $row); //open the updation form using that data
  }

  public function updateAdSubmit($username) //store the updated values from the view to the database
  {
    //PART 2
    $row = $this->getExistingData($username);

    //form validation 

    //$row indices for errors
        //   'titleErr'     16    
        //   'categoryErr'  17
        //   'tagErr'       18
        //   'contentErr'   19
        //   'statusErr'    20
        //   'priceErr'     21

    $title = $category = $tag = $content = $status = $price = $image = "";

    $ValidationErrors = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['logout'])) {
      if (empty($_POST["title"])) {
        $row[16] = "* Title is required";
        $ValidationErrors++;
      }

      if (empty($_POST["category"])) {
        $row[17] = "* Category is required";
        $ValidationErrors++;
      }

      if (empty($_POST["tag"])) {
        $row[18] = "* Tag is required";
        $ValidationErrors++;
      }

      if (empty($_POST["content"])) {
        $row[19]  = "* Content is required";
        $ValidationErrors++;
      }

      if (empty($_POST["status"])) {
        $row[20] = "* Status is required";
        $ValidationErrors++;
      }

      if (empty($_POST["price"])) {
        $row[21] = "* Price is required";
        $ValidationErrors++;
      }
    }
    if ($ValidationErrors == 0) { //there are no validation errors

      if (isset($_POST['submit'])) { //retrieveing data from the form

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

        //the image file
        if (!empty($_FILES["imageUpload"]["name"])) //the user have uploaded a new image
        {
          //Delete the older image file
          unlink("../public/assets/img/adUploads/$row[4]");

          //Process the new image that is uploaded by the user
          $target_dir = "../public/assets/img/adUploads/";
          $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          $filename = $_FILES["imageUpload"]["name"];

          move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);

          $timestamp = time();
          $image = $username . $timestamp . "." . $imageFileType; //generating an unique name to the image file
          rename("../public/assets/img/adUploads/$filename", "../public/assets/img/adUploads/$image"); //adding the generated name to the file

          $this->advertisements_model->updateWithImage($status, $category, $image, $title, $tag, $content, $username, $member1, $member2, $member3, $price);
        } else //the user have not uploaded a new image
        {
          $this->advertisements_model->updateWithoutImage($status, $category, $title, $tag, $content, $username, $member1, $member2, $member3, $price);
        }
      }
    } else {
      $this->view("updateAd", $row);
    }
  }


}
