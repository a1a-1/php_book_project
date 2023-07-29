<?php 
header('content-type:image/png');
//生成随机数
// echo mt_rand(0,255);
$strs="1234567890QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjkllzxcvbnm";
// echo strlen($strs);
$str1=$strs[mt_rand(0,strlen($strs) - 1)];
$str2=$strs[mt_rand(0,strlen($strs) - 1)];
$str3=$strs[mt_rand(0,strlen($strs) - 1)];
$str4=$strs[mt_rand(0,strlen($strs) - 1)];
//将随即生成的字符串保存，用于后期比对校验。
// session_start();
session_start(["name"=>"code"]);
$_SESSION["code_str"]=$str1.$str2.$str3.$str4;

$str=$str1.' '.$str2.' '.$str3.' '.$str4;
// echo $str;
// phpinfo();
// 图像处理函数
// 1，创建画布
// imagecreatetruecolor(画布宽度，画布高度)；
$img=imagecreatetruecolor(100,30);
// 2.给画布调颜色
// imagecolorallocate(画布名称，R,G,B);
$bg_color=imagecolorallocate($img,0,155,0);
//调字符串颜色
$str_color=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
//给线条调色
$line_color=imagecolorallocate($img,255,255,255);
// 3.给画布填充颜色
// imagefill(画布名称，填充起点x,填充起点的y,填充颜色);
imagefill($img,0,0,$bg_color);
// 4.给画布写入字符串
// imagestring(画布名称，字符串字号(1最小,2稍大,3是2的加粗,4最大,5是4的加粗)，起点X,起点Y,字符串内容,字符串颜色);
imagestring($img,5,20,8,$str,$str_color);
// 5.给画布绘制干扰线
// imageline(画布名称,起点x,起点y,终点x,终点y,线条颜色);
imageline($img,0,30,100,0,$line_color);
// 6.讲话不输出为png/jpg图像
imagepng($img);


?>