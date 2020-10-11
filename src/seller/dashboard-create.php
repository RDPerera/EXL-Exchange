
<?php
session_start();
$complete = "display:none";
$userName =$_SESSION['userName'];
//Database connection


$db = mysqli_connect('localhost', 'root', '', 'exl_main');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//form validation 

$titleErr = $userNameErr = $categoryErr = $tagErr =  $contentErr = $statusErr = $priceErr = "";
$title = $category = $tag = $content = $status = $price = "";

$ValidationErrors = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['logout'])) {
    
  if (empty($_POST["title"])) {
    $titleErr = "* Title is required";
    $ValidationErrors++;
  } else {
    $title = test_input($_POST["title"]);
  }
    
  if (empty($_POST["category"])) {
    $categoryErr = "* Category is required";
    $ValidationErrors++;

  } else {
    $category = test_input($_POST["category"]);
  }

  if (empty($_POST["tag"])) {
    $tagErr = "* Tag is required";
    $ValidationErrors++;
  } else {
    $tag = test_input($_POST["tag"]);
  }

  if (empty($_POST["content"])) {
    $contentErr = "* Content is required";
    $ValidationErrors++;

  } else {
    $content = test_input($_POST["content"]);
  }

  if (empty($_POST["status"])) {
    $statusErr = "* Status is required";
    $ValidationErrors++;
  } else {
    $status = test_input($_POST["status"]);
  }

  if (empty($_POST["price"])) {
    $priceErr = "* Price is required";
    $ValidationErrors++;
  } else {
    $price = test_input($_POST["price"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($ValidationErrors==0){ //there are no validation errors

    if (isset($_POST['fsubmit'])) {//retrieveing user entered data from the form

        $title = mysqli_real_escape_string($db, $_POST['title']);
        $category = mysqli_real_escape_string($db, $_POST['category']);
        $status = mysqli_real_escape_string($db, $_POST['status']);
        $tag = mysqli_real_escape_string($db, $_POST['tag']);
        $content = mysqli_real_escape_string($db, $_POST['content']);
        $member1 = mysqli_real_escape_string($db, $_POST['member1']);
        $member2 = mysqli_real_escape_string($db, $_POST['member2']);
        $member3 = mysqli_real_escape_string($db, $_POST['member3']);
        $price = mysqli_real_escape_string($db, $_POST['price']);

        //the image file
        if(isset($_FILES['imageUpload'])){

            //Process the image that is uploaded by the user
            $target_dir = "../advertisements/uploads/";
            $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);

            $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable

            $date = date('Y-m-d H:i:s'); //getting the current data and time
             
            //storing the data the database
            $query= "INSERT INTO advertisement (dateTime,status,category,image,title,tag,content,userName,member1,member2,member3,price) VALUES ('$date','$status', '$category','$image' , '$title' , '$tag' ,'$content' , '$userName' , '$member1' , '$member2' , '$member3','$price')";
            mysqli_query($db, $query);
            $complete="";
        }
    }
}

$userCheck = "SELECT * FROM user WHERE userName='$userName' LIMIT 1";
$result = mysqli_query($db, $userCheck);
$user = mysqli_fetch_assoc($result);
if ($user) { 
    $firstName=$user['firstName'];
    $lastName=$user['lastName'];
    $profilePicture = $user['profilePicture'];
    $dob=$user['dob'];
    $email=$user['email'];
    $userCheck = " SELECT * FROM seller WHERE userName='$userName' LIMIT 1 ";
    $result = mysqli_query($db, $userCheck);
    $user = mysqli_fetch_assoc($result);
    $mainRate=$user['mainRate'];
    $communicationRate=$user['communicationRate'];
    $deliveringRAte=$user['deliveringRate'];
}
else
{
    header('Location: ../login/login.php');
}
if(isset($_POST['logout']))
    {
        session_destroy();
        header('Location: ../login/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/sdashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/sdashboard-create-ad.css" />
    <link rel="stylesheet" type="text/css" href="../css/model.css">
    <script src="../js/sdashboard-create.js"></script>

</head>
<body>
<div id="model1" class="model-background" style="<?php echo $complete ?>">
        <div class="model-content">
            <div class="model-header"><span class="model-header-content">Created Successfully</span></div>
            <div class="model-text v-h-center">Your Ad created successfully !</div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><div class="right-head"><input type="submit" name="logout" value="Log Out" class="head-btn"></div>
        </div>
    </div>
    <input type="checkbox" id="home">
    <header class="header">
        <label for="home"><img src="../img/icons/ee-logo.png" class="home-menu"></label>
        <div class="left-head">Seller<span class="min-text"> Dashboard</span></div>
        <div class="right-head"><button class="head-btn">Log Out</button></div>
    </header>
    <div class="sidebar">
        <center>
            <div class="sidebar-profile-container">
                <a href="#"><img src="../seller/uploads/<?php echo $profilePicture ?>"class="sidebar-profile"></a>
            </div>
            <span class="slidbar-name"><?php echo $firstName." ".$lastName; ?></span>
        </center>
        <div class="sidebar-menu">
        <a href="dashboard.php"><img src="../img/icons/icons8-home-144.png" class="sidebar-icons"><span>Home</span></a>
        <a href="#"><img src="../img/icons/icons8-chat-96.png" class="sidebar-icons"><span>Messages</span></a>
        <a href="#"><img src="../img/icons/icons8-submit-resume-96.png " class="sidebar-icons"><span>Current Jobs</span></a>
        <a href="#"  class=" selected-item"><img src="../img/icons/icons8-plus-math-96.png" class="sidebar-icons"><span>Create Add</span></a>
        <a href="#"><img src="../img/icons/icons8-question-mark-96.png" class="sidebar-icons"><span>Help & Supports</span></a>
        <a href="#"><img src="../img/icons/icons8-complaint-90.png" class="sidebar-icons"><span>Complaints</span></a>
        <a href="#"><img src="../img/icons/icons8-settings-500.png" class="sidebar-icons"><span>Settings</span></a>
        </div>
    </div>
    <div class="content-super">
        <div class="sub-container">
            <div class="main-title-create"><span class="blue-text-create">Create </span>Advertisement</div>
            <form method="post" name="createAdForm" enctype="multipart/form-data">

                <div class="fieldset">
                    <label> Enter the title </label>
                    <input type="text" name="title">
                    <span class="error"> <?php echo $titleErr;?></span>
                </div>
                <div class="fieldset">
                    <label> Select the category </label>
                    <select name="category">
                        <option>
                            Graphics Designing
                        </option>
                        <option>
                            Programming
                        </option>
                        <option>
                            Content Writing
                        </option>
                    </select>
                    <span class="error"> <?php echo $categoryErr;?></span>

                </div>

                <div class="fieldset">
                    <label> Upload an image </label> &nbsp &nbsp &nbsp
                    <label class="browsebtn">
                        <input type='file' name='imageUpload' id='imageUpload' class="createbtn">
                        Browse
                    </label>

                </div>
                <br>
                <div class="fieldset">
                    <label for='radio'> Advertisement Status </label>
                    <span class="sub-set">
                        <input type="radio" id="active" name="status" value="active">
                        <label for="active">Active</label>
                        <input type="radio" id="inactive" name="status" value="inactive">
                        <label for="inactive">Inactive</label>
                    </span>
                    <span class="error"> <?php echo $statusErr;?></span>
                </div>
                <div class="fieldset">
                    <label>Enter a search tag </label>
                </div>
                <div class="fieldset">
                    <input type="text" name="tag">
                    <span class="error"> <?php echo $tagErr;?></span>
                    <div>
                        <br>
                        <div class="fieldset">
                            <label>Advertisement Content</label><br>
                            <textarea name="content"></textarea>
                            <span class="error"> <?php echo $contentErr;?></span>
                        </div>
                        <div class="fieldset">
                            <label>Enter the price</label>
                            <input type="text" name="price" placeholder="The Price In Srilankan Rupees">
                            <span class="error"> <?php echo $priceErr;?></span>

                        </div>
                        <div class="addcollabrators">Add Collaborators
                            <span class="colbtn" onclick="add()">+</span>
                            <span class="colbtn-" onclick="remove()">-</span>
                        </div>
                        <div id="field1" class="mem-fieldset" style="display:none">
                            <label> Group member 01 </label>
                            <input type="text" name="member1" class="member"
                                placeholder="Enter the EXL Exchange username of the first member">
                        </div>
                        <div id="field2" class="mem-fieldset" style="display:none">
                            <label> Group member 02 </label>
                            <input type="text" name="member2" class="member"
                                placeholder="Enter the EXL Exchange username of the second member">
                        </div>
                        <div id="field3" class="mem-fieldset" style="display:none">
                            <label> Group member 03 </label>
                            <input type="text" name="member3" class="member"
                                placeholder="Enter the EXL Exchange username of the third member">
                        </div>

                        <input type="submit" name="fsubmit" value="Create" class="createbtn">
            </form>
        </div>
    </div>
    <script>
        // Get the modal and button
        var modal1 = document.getElementById("model1");
        // When the user clicks on button close,it will close the modal
        function dispose() {
        modal1.style.display = "none";
        window.location.replace("seller/dashboard.php");
        };
    </script>
</body>

</html>