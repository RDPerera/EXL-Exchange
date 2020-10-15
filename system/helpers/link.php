<?php

function linkCSS($cssPath){

    
    $url = BASEURL . "/" .$cssPath;
    echo '<link rel="stylesheet" href="'. $url .'">';


}

function linkJS($jsPath){

    $url = BASEURL. "/". $jsPath;
    echo '<script src="'. $url .'"></script>';
}

function linkFav($jsPath){

    $url = BASEURL. "/". $jsPath;
    echo '<link rel="stylesheet" type="image/png" href="'. $url .'">';
}


?>