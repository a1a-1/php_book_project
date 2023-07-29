
<?php 
    // 1.接收前端携带的用户输入的验证码
    $codeValue=$_REQUEST["codeValue"];
    //获取服务器端随机生成的验证码
    session_start(["name"=>"code"]);
    // session_start();
    $code_str=$_SESSION["code_str"];
    // echo $codeValue;

    //打印session中的值，这里要注释掉，只打印1或0即可。 
    // echo $code_str;



    $res=0;
    if($codeValue==$code_str){
        $res=1;
    }else{
        $res=0;
    }

echo $res;
 
?>