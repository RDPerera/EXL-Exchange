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



//print_r($_POST);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$startdate = $_POST['startDate'];

$sql = "INSERT INTO moderators (firstname,lastname,email,startdate) VALUES ('$firstname' , 
'$lastname' , '$email' , '$startdate')";

if($conn->query($sql)==TRUE){
	
	echo "table created sucessfully " .$conn->error;
	

}
else{
	header("../error/505.php")
}

?>

