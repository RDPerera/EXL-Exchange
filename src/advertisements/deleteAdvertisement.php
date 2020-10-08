<?php 

$db = mysqli_connect('localhost:3308', 'root', '', 'exl_main');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Retrieving the advertisement id by using GET
$adID = $_GET['id'];
$query = "DELETE FROM advertisement WHERE advertisementID = $adID"; 

if(mysqli_query($db, $query)){
    echo "Deleted the advertisement - $adID successfully";
}

mysqli_close($db);
 ?>