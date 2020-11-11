<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exl-main";


$con=mysqli_connect($servername,$username,$password ,$dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"delete from moderators where id = '$id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    //header("location:all_records.php"); // redirects to all records page
    echo "deleted sucessfully";
    exit;	
}
else
{
    echo "Error deleting record " . $conn->error;// display error message if not delete
}

mysqli_close($con);
?>