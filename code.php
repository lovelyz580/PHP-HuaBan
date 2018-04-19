<?php
session_start();
header('Content-Type:image/png');
$im = imagecreate(44, 18);
$back = imagecolorallocate($im, 245, 245, 245);
imagefill($im,0,0,$back);
$vcode="";
srand((double) microtime()*1000000);
for($i=0;$i<4;$i++){
    $autonum = rand(0, 9);
    $color = imagecolorallocate($im, rand(100,255), rand(0,100), rand(100,255));
    imagestring($im, 5, $i*10+2,1, $autonum, $color);
    $vcode.=$autonum;
}
$_SESSION['code']=$vcode;
imagepng($im);
imagedestroy($im);