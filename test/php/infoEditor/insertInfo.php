<?php
// 1.连接数据库
    include "../conn.php";
// 2.获取表单信息
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $desc = $_POST['desc'];
    $headPic = $_FILES['headPic'];
    $phone=$_POST['phone'];

// 输出$_FILES 和 $_POST查看获取到的信息

//来判断当前页面是做insert还是update
$sql_sel="select * from user_info where phone = '$phone'";
$res_sel=mysqli_query($conn,$sql_sel);

// 上传图到服务器上

if($headPic['size']!=0){
include "../uploadImg.php";
$name_2 = 'headPic/'.$stu_num.time();
$headPic=uploadImg($headPic,$name_2);//头像地址
}else{
    $data = mysqli_fetch_assoc($res_sel);
    $headPic = $data['headPic'];
}

// print_r($imgUrl);

if($res_sel -> num_rows){
    //该学生信息已经注册过了
    echo "执行update操作";
    include "update.php";
    update($conn,$name,$gender,$age,$phone,$city,$desc,$headPic);

}else{
    // 该学生信息没有注册过
    echo "执行insert操作";
    include "insert.php";
    insert($conn,$name,$gender,$age,$phone,$city,$desc,$headPic);
}





?>