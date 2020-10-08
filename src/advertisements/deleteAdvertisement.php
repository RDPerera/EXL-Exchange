<?php 

$db = mysqli_connect('localhost:3308', 'root', '', 'exl_main');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Retrieving the advertisement username by using GET
$adUsername = $_GET['username'];
$query = "DELETE FROM advertisement WHERE username = '$adUsername'"; 

if(mysqli_query($db, $query)){
    echo "Deleted the advertisement - $adUsername successfully";
}

//code the redirection
mysqli_close($db);
 ?>