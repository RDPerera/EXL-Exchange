<?php

//$db = mysqli_connect('localhost', 'root', '', 'exl_main');

//form validation - WITHOUT STATUS

// define variables and set to empty values
$titleErr = $emailErr = $categoryErr = $tagErr =  $contentErr = $statusErr ="";
$title = $email = $category = $tag = $content = $status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
    $titleErr = "* Title is required";
  } else {
    $title = test_input($_POST["title"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["category"])) {
    $categoryErr = "* Category is required";
  } else {
    $category = test_input($_POST["category"]);
  }

  if (empty($_POST["tag"])) {
    $tagErr = "* Tag is required";
  } else {
    $tag = test_input($_POST["tag"]);
  }

  if (empty($_POST["content"])) {
    $contentErr = "* content is required";
  } else {
    $content = test_input($_POST["content"]);
  }

  if (empty($_POST["status"])) {
    $statusErr = "* status is required";
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

if(isset($_POST['submit'])){ 
  echo '<p> yes </p>';
}
else{
  echo '<p> no </p>';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/createAdForm.css" />
    <script type="text/javascript" src="../js/createAdForm.js"></script>
    <title>Create an advertisement</title>
</head>

<body>
    <h1 align="center">Enter the Advertisement Details</h1>
    <form method="post" name="createAdForm">
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
                        <input type="file" name="image">
                        Browse
                    </label> &nbsp &nbsp
                    <input type='submit' value='Upload' name='but_upload'>
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
                    <input type="text">
                </td>
            </tr>

            <tr>
                <td>
                    Group member 02
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <td>
                    Group member 03
                </td>
                <td>
                    <input type="text">
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