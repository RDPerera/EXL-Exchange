<?php

echo"
        <div class='card'>
            <div class='card-top'>
                <a href='../advertisements/view-v.php?id=".$row['advertisementID']."'><img src='".adIMG($row['image'])."' alt='Unsplash Photo'></a></div>
            <div class='card-content'>
                <div class='top'>
                <div class='user'><img src='".userIMG($row['profilePicture'])."' class='profile'><span class='name'><a href='../seller/view.php?id=".$row['userName']."' target='_blank'>".$row['firstName']." ".$row['lastName']."</a></span><span class='srate'>Seller Rate ".$row['mainRate']."</span></div>
                <a href='../advertisements/view-v.php?id=".$row['advertisementID']."'><span class='title'>".$row['title']."</span></a>
                </div>
                <div class='bottom'>
                        <span class='feed-container'>LKR ".$row['price']."</span>
                        <span class='rate-container'><img src='".icoIMG('icons8-star-96.png')."' class='ratingIcon'>
                        <span class='rating'>".$row['rate']." | Feedbacks ".$row['feedbacks']."</span>
        </span></div></div></div>
    ";

?>