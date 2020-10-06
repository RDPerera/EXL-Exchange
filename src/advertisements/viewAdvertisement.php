<?php

//Database connection

$db = mysqli_connect('localhost:3308', 'root', '', 'exl_main');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query = "SELECT * FROM advertisement"; //update this when linking this to dashboard

echo "<div class='row'>";
    //column 1
    echo "<div class='column' >";
    if($result = mysqli_query($db, $query)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                
                echo "<div class=\"polaroid\">";
                    echo "<img src='uploads/$row[4].jpg' height='490px' width='490px'>";
                    echo "<div class=\"container\">";
                        echo "<p class='imageBottom'> $row[3] Advertisements <br> #$row[6]</p>";
                    echo" </div> ";
                echo "</div>";
    
    echo "</div>";
    
    //column 2
    echo "<div class='column' >";
                

                echo "<div class=\"polaroidRightColumn\">";
                echo "";
                    echo "<h1> $row[5] </h1>";
                    echo "<p class='desc'> $row[7] </p>";
                    // echo "<div class=\"container\">";
                    //     echo "<p> $row[3] Adverstisements <br> #$row[6]</p>";
                    // echo" </div> ";
                echo "</div>";

                    
                

    echo "</div>";
echo "</div>";
            }
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching the query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($db);
    }


// Close connection
mysqli_close($db);

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View the advertisement</title>
    <link rel="stylesheet" type="text/css" href="../css/viewAdvertisement.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
</head>
<body>
</body>

</html>