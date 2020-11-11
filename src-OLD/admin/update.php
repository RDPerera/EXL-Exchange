<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exl-main";

$conn = new mysqli($servername,$username,$password ,$dbname);


if($conn->connect_error){
	die("connection failed :" .$conn->connect_error);
}
    echo "connected sucessfully";

$id = $_GET['id'];
$qry = mysqli_query($conn,"select * from moderators where id='$id'");

$data = mysqli_fetch_array($qry); 

if(isset($_POST['update'])) // when click on Update button
{
    $firstname= $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $startdate= $_POST['startdate'];
    print_r($_POST);
    $edit = mysqli_query($conn,"update moderators set firstname='$firstname', lastname='$lastname'  , email='$email' , 
    startdate='$startdate' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
       // header("location:all_records.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>





<html>
    <head><link rel="stylesheet" href="../css/style.css"></head>

    <body>
    <h3>Update Data</h3>
    <div class="form-style-10">
<form method="post">
<div class="section">Enter Info</div>
		<div class="inner-wrap">
				<label for="firstname">First Name: </label>
				<input type="text" name="firstname" value="<?php echo $data['firstname'] ?>" placeholder="Enter First Name" Required>
		</div>

		<br>

		<div class="inner-wrap">

			<label for="last name">Last Name:</label>
            <input type="text" name="lastname" value="<?php echo $data['lastname'] ?>" placeholder="Enter lastname" Required>

		</div>

		<br>

		<div class="inner-wrap">
			<label for="E-mail">E-mail:</label>
			<input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter email " Required>
		</div>

		<br>

		<div class="inner-wrap">
			<label for="start date">Start Date:</label>
            <input type="date" name="startdate" value="<?php echo $data['startdate'] ?>" placeholder="Enter the date" Required>
		</div>

		<br>
		<br>

		<div class="button-section">
        <input type="submit" name="update" value="Update">
</div>

</form>
</div>

</body>
</html>