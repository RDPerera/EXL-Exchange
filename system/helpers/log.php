<?php
function logUserAccess($userName,$accountType,$status)
{
    date_default_timezone_set('Asia/Colombo');
    $loc="../logs/access/".date("Y-m-d")."_access.txt";
    //if($_SERVER['REMOTE_ADDR']="::1"){$ip="LOCALHOST";$geoLoc['country']=$geoLoc['country']='LOCAL';}else{$ip=$_SERVER['REMOTE_ADDR'];$geoLoc=getLocInfo();}
    $ip="LOCAL";
    if ($status==1){$status="ACCESSED";}else{$status="DENIED";}
    $geoLoc=getLocInfo();
    $log="[" . date('Y-m-d H:i:s') . "]\t" . $userName. "             \t\t" . $accountType . 
    "         \t\t" . $ip . "\t\t" . $_SERVER['REMOTE_PORT']."\t\t".$geoLoc->country."\t\t".$geoLoc->city."\t\t". $status . "\n";
    $fp = fopen($loc,'a');
    fwrite($fp, $log);
    fclose($fp); 
}
function getLocInfo()
{
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
        $real_ip_adress = $_SERVER['REMOTE_ADDR'];
    }
    $cip = $real_ip_adress;
    $details = json_decode(file_get_contents("http://ipinfo.io/{$cip}/json"));
    return $details;
}
function logSellerAccess($userName){logUserAccess($userName,"SELLER",1);}
function logBuyerAccess($userName){logUserAccess($userName,"BUYER",1);}
function logAdminAccess($userName){logUserAccess($userName,"ADMIN",1);}
function logModeratorAccess($userName){logUserAccess($userName,"MODE",1);}
function logAccessDenied($userName){logUserAccess($userName,"UNOTH",0);}
?>
