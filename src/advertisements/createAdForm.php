<?php

//Database connection

$db = mysqli_connect('localhost:3308', 'root', '', 'exl_main');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//form validation 

$titleErr = $emailErr = $categoryErr = $tagErr =  $contentErr = $statusErr ="";
$title = $email = $category = $tag = $content = $status = "";

$ValidationErrors = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
    $titleErr = "* Title is required";
    $ValidationErrors++;
  } else {
    $title = test_input($_POST["title"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
    $ValidationErrors++;
  } else {
    $email = test_input($_POST["email"]);
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
    $contentErr = "* content is required";
    $ValidationErrors++;

  } else {
    $content = test_input($_POST["content"]);
  }

  if (empty($_POST["status"])) {
    $statusErr = "* status is required";
    $ValidationErrors++;
  } else {
    $status = test_input($_POST["status"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($ValidationErrors==0){ //there are no validation errors

    if (isset($_POST['submit'])) {//retrieveing user entered data from the form

        $title = mysqli_real_escape_string($db, $_POST['title']);
        $category = mysqli_real_escape_string($db, $_POST['category']);
        $status = mysqli_real_escape_string($db, $_POST['status']);
        $tag = mysqli_real_escape_string($db, $_POST['tag']);
        $content = mysqli_real_escape_string($db, $_POST['content']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $member1 = mysqli_real_escape_string($db, $_POST['member1']);
        $member2 = mysqli_real_escape_string($db, $_POST['member2']);
        $member3 = mysqli_real_escape_string($db, $_POST['member3']);


        if(isset($_FILES['imageUpload'])){
            //Process the image that is uploaded by the user
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);

            // if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            //     echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
            // } else {
            //     echo "Sorry, there was an error uploading your file.";
            // }

            $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable

            $date = date('Y-m-d H:i:s'); //getting the current data and time
             
            //storing the data the database
            $query= "INSERT INTO advertisement (dateTime,status,category,image,title,tag,content,email,member1,member2,member3) VALUES ('$date','$status', '$category','$image' , '$title' , '$tag' ,'$content' , '$email' , '$member1' , '$member2' , '$member3')";
            mysqli_query($db, $query);
        }
    }
}
else{
    echo '<p> val error!! </p>';
}

if(isset($_POST['submit'])){ 
  echo '<p> yes </p>';
}
else{
  echo '<p> no </p>';
}

// Close connection
mysqli_close($db);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/createAdForm.css" />
    <title>Create an advertisement</title>
</head>

<body>
    <h1 align="center">Enter the Advertisement Details</h1>
    <form method="post" name="createAdForm" enctype="multipart/form-data">
        <table align="center">
            <tr>
                <td>
                    Enter the title
                </td>
                <td>
                    <input type="text" name="title">
                    <span class="error"> <?php echo $titleErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Select the category
                </td>
                <td>
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
                </td>
            </tr>
            <tr>
                <td>
                    Upload an image
                </td>
                <td>
                    <label class="custom-file-upload">
                        <input type='file' name='imageUpload' id='imageUpload'>
                        Browse
                    </label> &nbsp &nbsp
                    <input type='submit' value='Upload'>
                </td>
            </tr>
            <tr>
                <td>
                    Advertisement Status
                </td>
                <td>
                    <input type="radio" id="active" name="status" value="active">
                    <label for="active">Active</label><br>
                    <input type="radio" id="inactive" name="status" value="inactive">
                    <label for="inactive">Inactive</label><br>
                    <span class="error"> <?php echo $statusErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Enter a search tag
                </td>
                <td>
                    <input type="text" name="tag">
                    <span class="error"> <?php echo $tagErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Advertisement Content
                </td>
                <td>
                    <textarea name="content"></textarea>
                    <span class="error"> <?php echo $contentErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Enter your email
                </td>
                <td>
                    <input type="email" id="email" name="email">
                    <span class="error"> <?php echo $emailErr;?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Add collaborators to the advertisement </h3>
                    <h5>Enter the EXL Exchange username of each member</h5>
                </td>

            </tr>

            <tr>
                <td>
                    Group member 01
                </td>
                <td>
                    <input type="text" name="member1">
                </td>
            </tr>

            <tr>
                <td>
                    Group member 02
                </td>
                <td>
                    <input type="text" name="member2">
                </td>
            </tr>

            <tr>
                <td>
                    Group member 03
                </td>
                <td>
                    <input type="text" name="member3">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Create">
                </td>
            </tr>
        </table>
    </form>


</body>

</html>