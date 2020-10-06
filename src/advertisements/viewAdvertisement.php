<?php

//Database connection

$db = mysqli_connect('localhost:3308', 'root', '', 'exl_main');

$query = "SELECT * FROM advertisement";


//displaying the image
$result = mysqli_query($db, $query);
//$result = mysqli_fetch_array();

while($row = mysqli_fetch_array($result)) {
    // echo "<tr>";
    // echo "<td>$row[0]</td>";
    // echo "</tr>\n";
    echo "<table>";
    echo "<tr>";
    echo "<td><img src='uploads/$row[4].jpg' height='150px' width='300px'></td>";
    echo "</tr>\n";
    echo $row[4];
    echo "</table>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View the advertisement</title>
    <link rel="stylesheet" type="text/css" href="../css/viewAdvertisement.css" />
</head>
<body>

    <div class="row">
        <div class="column" >
        asd
        </div>
        <div class="column">
        asda
        </div>
    </div>
</body>
</html>