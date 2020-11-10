<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/view.css">
</head>
<body>
    <h1>Moderator </h1>
   

<table >
  <tr>
    <td>id</td>
    <td>first name</td>
    <td>last name</td>
    <td>E mail</td>
    <td>start date</td>
    <td>edit</td>
    <td>delete</td>
  </tr>




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

$result = mysqli_query($con,"SELECT * FROM moderators");


while($row = mysqli_fetch_array($result))
{
?>
<td><?php echo $row['id'] ; ?></td>
<td><?php echo $row['firstname'] ; ?></td>
<td><?php echo $row['lastname'] ; ?></td>
<td><?php echo $row['email'] ; ?></td>
<td><?php echo $row['startdate'] ; ?></td>
<td><a href="update.php?id=<?php echo $row['id']; ?>"> <button type="button">Edit</button></a></td>
<td><a href="deletemod.php?id=<?php echo $row['id']; ?>"><button type="button">Delete</button></a></td>

</tr>
<?php
}
?>
</table>
<?php
mysqli_close($con);
?>
</table>
</body>
</html>