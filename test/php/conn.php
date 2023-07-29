<?php 
    $host='localhost';
    $user="root";
    $password="123456";
    $db_name='book';
    // 连接数据库
    $conn=mysqli_connect($host,$user,$password,$db_name);
    if($conn){
        // echo "连接成功！";
    }else{
        // echo "连接失败！";
        
    }
?>