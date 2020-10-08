<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update the advertisement</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/updateAdvertisement.css" />
</head>

<body>

    <?php
    
//Database connection

$db = mysqli_connect('localhost:3308', 'root', '', 'exl_main');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Retrieving the form data
$adID = $_GET['id'];
$query = "SELECT * FROM advertisement WHERE advertisementID = $adID"; 

$options="";
$optionArray= Array("Graphics Designing","Programming","Content Writing");

$activeCheck = $inactiveCheck = "";
    if($result = mysqli_query($db, $query))
    {
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                //to handle the select tag (to retrieve data from database and display in the page)
                    if($row[3] == $optionArray[0])
                    { 
                        $options = "<option selected>$row[3]</option><option>$optionArray[1]</option><option>$optionArray[2]</option>";
                    }
                    else if($row[3] == $optionArray[1])
                    {
                        $options = "<option>$optionArray[0]</option><option selected>$optionArray[1]</option><option>$optionArray[2]</option>";
                    }
                    else
                    {
                        $options = "<option>$optionArray[0]</option><option>$optionArray[1]</option><option selected>$optionArray[2]</option>";
                    }

                //to handle the radio button (to retrieve data from database and display in the page)
                
                if($row[2]=="active"){
                    $activeCheck = "checked";
                }
                else{
                    $inactiveCheck = "checked";
                }

                
                //updation form validation 

                $titleErr = $emailErr = $categoryErr = $tagErr =  $contentErr = $statusErr = $priceErr = "";
                $title = $email = $category = $tag = $content = $status = $price = "";
                
                function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
                }

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
                
                if($ValidationErrors==0){ //there are no validation errors
                
                    if (isset($_POST['submit'])) {//retrieveing data from the form
                
                        $title = mysqli_real_escape_string($db, $_POST['title']);
                        $category = mysqli_real_escape_string($db, $_POST['category']);
                        $status = mysqli_real_escape_string($db, $_POST['status']);
                        $tag = mysqli_real_escape_string($db, $_POST['tag']);
                        $content = mysqli_real_escape_string($db, $_POST['content']);
                        $email = mysqli_real_escape_string($db, $_POST['email']);
                        $member1 = mysqli_real_escape_string($db, $_POST['member1']);
                        $member2 = mysqli_real_escape_string($db, $_POST['member2']);
                        $member3 = mysqli_real_escape_string($db, $_POST['member3']);
                        $price = mysqli_real_escape_string($db, $_POST['price']);
                
                        //the image file
                        if(isset($_FILES['imageUpload'])){
                
                            //Delete the older image file
                            //QUERY

                            
                
                            //Process the image that is uploaded by the user
                            $target_dir = "uploads/";
                            $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                
                            move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);
                
                            $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable
                
                            $date = date('Y-m-d H:i:s'); //getting the current data and time
                      
                            //storing the data the database //IMAGE
                            $query = "UPDATE advertisement SET status = '$status' ,category = '$category', title = '$title' ,tag = '$tag' ,content = '$content' ,email = '$email' ,member1 = '$member1',member2 = '$member2' ,member3 = '$member3' ,price = '$price' WHERE advertisementID = $adID ";
                            mysqli_query($db, $query);

                        }
                    }
                }
                
?>
    <h1 align="center">Update the Advertisement</h1>
    <form method="post" enctype="multipart/form-data">
        <div class='center'>
            <div class='polaroid'>
                <label> Enter the title </label>
                <input type="text" name="title" value="<?php echo $row[5]; ?>">
                <span class="error"> <?php echo $titleErr;?></span>

                <br><br>
                <label>The category </label>
                <select name="category">
                    <?php echo $options;?>
                </select>
                <span class="error"> <?php echo $categoryErr;?></span>
                <br><br>

                <!-- HANDLE THE IMAGE UPDATION -->
                <label> Upload an image </label> &nbsp &nbsp &nbsp
                <label class="custom-file-upload">
                    <input type='file' name='imageUpload' id='imageUpload'>
                    Browse
                </label>
                <br><br>
                <!-- HANDLE THE IMAGE UPDATION -->
                <label for='radio'> Advertisement Status </label> <br><br>
                <input type="radio" id="active" name="status" value="active" <?php echo $activeCheck;?> >
                <label for="active">Active</label><br>
                <input type="radio" id="inactive" name="status" value="inactive" <?php echo $inactiveCheck;?> >
                <label for="inactive">Inactive</label><br>
                <span class="error"> <?php echo $statusErr;?></span>
                <br><br>
                <label>The search tag </label>

                <input type="text" name="tag" value=" <?php echo $row[6];?>">
                <span class="error"> <?php echo $tagErr;?></span>

                <br><br>

                <label>Advertisement Content</label>
                <textarea name="content"><?php echo $row[7];?></textarea>

                <span class="error"> <?php echo $contentErr;?></span>

                <br><br>
                <label>The email</label>
                <input type="email" id="email" name="email" value=" <?php echo $row[8];?>">
                <span class="error"> <?php echo $emailErr;?></span>
                <br><br>

                <label>The price</label>
                <input type="text" name="price" placeholder="The price in Srilankan Rupees" value=" <?php echo $row[12];?>">
                <span class="error"> <?php echo $priceErr;?></span>
                <br><br>

                <h3>Update Collaborators of the Advertisement </h3>

                <label> Group member 01 </label>
                <input type="text" name="member1" placeholder="Enter the EXL Exchange username of the first member" value=" <?php echo $row[9];?>">

                <label> Group member 02 </label>
                <input type="text" name="member2" placeholder="Enter the EXL Exchange username of the second member" value=" <?php echo $row[10];?>">

                <label> Group member 03 </label>
                <input type="text" name="member3" placeholder="Enter the EXL Exchange username of the third member" value=" <?php echo $row[11];?>">
                <br><br>
                <input type="submit" name="submit" value="Update The Advertisement">
            </div>
    </form>

    <?php 
            }
                       
        
        }

    }

// Close connection
// mysqli_close($db);
?>

</body>

</html>

<?php


?>