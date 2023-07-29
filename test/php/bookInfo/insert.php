<?php
include "../setsession.php";
//用于创建insert操作的函数
function insert($conn,$name,$author,$type,$count,$price,$desc_info,$sort,$headPic){
    print_r($headPic);
    $sql = "insert into book(name,author,type,count,price,img,desc_info,sort) values('$name','$author','$type','$count',
    '$price','$headPic','$desc_info','$sort')";
    $res=mysqli_query($conn,$sql);
    print_r($res);
    if($res){
        // 设置缓存
        echo "<script>";
        echo "alert('完善信息成功！');";
        echo "window.location.href='http://www.test.com/book_list.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('完善信息失败！');";
        echo "window.location.href='../../book_list.php'";
        echo "</script>";
    }
}

?>