<?php
    //SO
	$ver = "Bj4K4 V-2.0";
if (@ereg("Windows NT 5.1", $_SERVER["HTTP_USER_AGENT"])){
    $os="Windows eXPerience(XP) &nbsp $ver";
}elseif(@ereg("Windows",$_SERVER["HTTP_USER_AGENT"])){
    $os="Windows 7 &nbsp $ver"; 
}elseif((@ereg("Mac",$_SERVER["HTTP_USER_AGENT"]))||(ereg("PPC",$_SERVER["HTTP_USER_AGENT"]))){
    $os="MacOS&nbsp $ver";
}elseif(@ereg("Linux",$_SERVER["HTTP_USER_AGENT"])){
    $os="Linux&nbsp $ver";
}elseif(@ereg("FreeBSD",$_SERVER["HTTP_USER_AGENT"])){
    $os="FreeBSD&nbsp $ver";
}elseif(@ereg("SunOS",$_SERVER["HTTP_USER_AGENT"])){
    $os="SunOS&nbsp $ver";
}elseif(ereg("IRIX",$_SERVER["HTTP_USER_AGENT"])){
    $os="IRIX&nbsp $ver";
}elseif(@ereg("BeOS",$_SERVER["HTTP_USER_AGENT"])){
    $os="BeOS";
}elseif(@ereg("OS/2",$_SERVER["HTTP_USER_AGENT"])){
    $os="OS/2&nbsp $ver";
}elseif(@ereg("AIX",$_SERVER["HTTP_USER_AGENT"])){
    $os="AIX&nbsp $ver";
	
}else{
   
}

//IP
function IPnya() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP Tidak Dikenali';
 
    return $ipaddress;
}
$ipaddress = $_SERVER['REMOTE_ADDR'];

?>
