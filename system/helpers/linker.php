<?php

function linkCSS($cssPath){
    $url = BASEURL . "/assets/css/" .$cssPath.".css";
    echo '<link rel="stylesheet" href="'. $url .'">';
}

function linkJS($jsPath){

    $url = BASEURL. "/assets/js/". $jsPath.".js";
    echo '<script src="'. $url .'"></script>';
}

function linkFAV($favPath){

    $url = BASEURL. "/assets/img/icons/". $favPath;
    echo '<link rel="stylesheet" type="image/png" href="'. $url .'">';
}

function srcIMG($imgName)
{
    $url = BASEURL."/assets/img/".$imgName;
    echo $url;
}

?>