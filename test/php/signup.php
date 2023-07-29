<?php
// 引入数据库链接文件。
include "conn.php";
// 2.接收注册页面form表单的值
// 获取用户名，密码1，密码2
$username=$_POST["phone"];
$password1=$_POST["password1"];
$password2=$_POST["password2"];
// print_r($password1);
// print_r($password2);
// 3.校验两次输入的密码是否相等
if($password1 == $password2){
    // echo"密码相同";
    // 4.如果一致，判断该账号是否存在
    $sql_sel="select * from user where phone='$username'";
    $res_sel=mysqli_query($conn,$sql_sel);
    // print_r($res_sel);

    if($res_sel -> num_rows){
        echo "<script>";
        echo "alert('该账号已经注册,请直接登录.');";
        echo "window.location.href='../login.html'";
        echo "</script>";
    }else{
        // 新用户正常注册
        $insert="insert into user values(default,'$username','$password1',default)";
        $res_insert=mysqli_query($conn,$insert);
        print_r($username.$password1);
        if($res_insert){
            echo "<script>";
            echo "alert('注册成功,请登录.');";
            echo "window.location.href='../login.html'";
            echo "</script>";     
        }else{
            echo "<script>";
            echo "alert('注册失败,请重新注册.');";
            // echo "window.location.href='../register.html'";
            echo "</script>"; 
        }
    }
    
    // $res=mysqli_query($conn,$select);
    // if($res==null){

    // }
}else{
    
    echo "<script>";
    echo "alert('两次密码不一致');";
    echo "window.location.href='../register.html'";
    echo "</script>";
}


// 5.将用户名和密码进行数据库存储


?>