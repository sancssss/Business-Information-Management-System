<?
$size = getimagesize("D:\PHP\www\web\test\1.png"); //获取mime信息 
$fp=fopen("D:\PHP\www\web\test\1.png", "rb"); //二进制方式打开文件 
if ($size && $fp) { 
header("Content-type: {$size['mime']}"); 
fpassthru($fp); // 输出至浏览器 
exit; 
} else { 
// error 
} 