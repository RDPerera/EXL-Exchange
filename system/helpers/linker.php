<?php

function linkCSS($cssPath){
    $url = BASEURL . "/assets/css/" .$cssPath.".css";
    echo '<link rel="stylesheet" type="text/css" href="'. $url .'">';
}

function linkSCSS($scssPath){
    $url = BASEURL . "/assets/css/" .$scssPath.".less";
    echo '<link rel="stylesheet" type="text/css" href="'. $url .'">';
}

function linkJS($jsPath){

    $url = BASEURL. "/assets/js/". $jsPath.".js";
    echo '<script src="'. $url .'"></script>';
}

function linkFAV($favPath){

    $url = BASEURL. "/assets/img/icons/". $favPath;
    echo '<link rel="icon" type="image/png" href="'. $url .'">';
}
function icoIMG($imgName)
{
    $url = BASEURL."/assets/img/icons/".$imgName;
    return $url;
}
function srcIMG($imgName)
{
    $url = BASEURL."/assets/img/".$imgName;
    return $url;
}
function adIMG($imgName)
{
    $url = BASEURL."/assets/img/adUploads/".$imgName;
    return $url;
}
function userIMG($imgName)
{
    $url = BASEURL."/assets/img/userImages/".$imgName;
    return $url;
}
?>