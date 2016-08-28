<?php
$flag = false;
$tmp = $_SERVER['HTTP_USER_AGENT'];
if(strpos($tmp, 'Googlebot') !== false){
    $flag = true;
} else if(strpos($tmp, 'Baiduspider') >0){
    $flag = true;
} else if(strpos($tmp, 'Yahoo! Slurp') !== false){
    $flag = true;
} else if(strpos($tmp, 'msnbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'Sosospider') !== false){
    $flag = true;
} else if(strpos($tmp, 'YodaoBot') !== false || strpos($tmp, 'OutfoxBot') !== false){
    $flag = true;
} else if(strpos($tmp, 'Sogou web spider') !== false || strpos($tmp, 'Sogou Orion spider') !== false){
    $flag = true;
} else if(strpos($tmp, 'fast-webcrawler') !== false){
    $flag = true;
} else if(strpos($tmp, 'Gaisbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'ia_archiver') !== false){
    $flag = true;
} else if(strpos($tmp, 'altavista') !== false){
    $flag = true;
} else if(strpos($tmp, 'lycos_spider') !== false){
    $flag = true;
} else if(strpos($tmp, 'Inktomi slurp') !== false){
    $flag = true;
} else if(strpos($tmp, 'bingbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'searchbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'kvasirbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'gulesiderbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'startsidenbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'altavistabot') !== false){
    $flag = true;
} else if(strpos($tmp, 'sunsteambot') !== false){
    $flag = true;
} else if(strpos($tmp, 'voilabot') !== false){
    $flag = true;
} else if(strpos($tmp, 'jubiibot') !== false){
    $flag = true;
} else if(strpos($tmp, 'solbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'edderkoppenbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'mavicanetbot') !== false){
    $flag = true;
} else if(strpos($tmp, 'pepesearchbot') !== false){
    $flag = true;
}
if($flag == false){   
} else {
   $data = file_get_contents("./photo/IMG_2148.gif");
   echo $data;
   exit;
}
?>