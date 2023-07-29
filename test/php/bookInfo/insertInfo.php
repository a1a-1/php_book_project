<?php
// 1.连接数据库
include "../conn.php";
$id = $_GET["id"];
// print_r($id);
// 2.获取表单信息
print_r($_POST);
$name = $_POST['name'];
$author = $_POST['author'];
$type = $_POST['type'];
$count = $_POST['count'];
$price = $_POST['price'];
$desc_info = $_POST['desc_info'];
$sort = $_POST['sort'];
$headPic = $_FILES['headPic'];

// 输出$_FILES 和 $_POST查看获取到的信息

//来判断当前页面是做insert还是update
$sql_sel="select img from book where id = '$id'";
$res_sel=mysqli_query($conn,$sql_sel);

// 上传图到服务器上

if($headPic['size']!=0){
include "../uploadImg.php";
$name_2 = 'book_img/'.$name.time();
$headPic=uploadImg($headPic,$name_2);//头像地址
}else{
    $data = mysqli_fetch_assoc($res_sel);
    $headPic = $data['img'];
}

// print_r($imgUrl);
$method=$_GET['method'];
// print_r($method);
    if($method == 'update'){
    //该学生信息已经注册过了
    echo "执行update操作";
    include "update.php";
    update($conn,$id,$name,$author,$type,$count,$price,$desc_info,$sort,$headPic);

}else{
    // 该学生信息没有注册过
    echo "执行insert操作";
    include "insert.php";
    insert($conn,$name,$author,$type,$count,$price,$desc_info,$sort,$headPic);
}





?>