<?php
include "../setsession.php";
//用于创建insert操作的函数
function insert($conn,$name,$gender,$age,$phone,$city,$desc_info,$headPic){
    print_r($headPic);
    $sql = "insert into user_info(name,gender,age,phone,city,desc_info,headPic) values('$name','$gender','$age','$phone','$city','$desc_info','$headPic')";
    $res=mysqli_query($conn,$sql);
    print_r($res);
    if($res){
        // 设置缓存
        $sql_id="select id from user_info where phone = '$phone'";
        $res_id =mysqli_query($conn,$sql_id);
        if($res_id -> num_rows){
            $res_id=mysqli_fetch_assoc($res_id);
            // 开始获取每一个信息
            $res_id = $res_id['id'];
        }
        $info = [
            "username"=> $name,
            "isLogin" => 1,
            "headPic" => $headPic,
            "stu_num" => $phone,
            "user_id" => $res_id,
            "cart" => array()
    ];
        setSession('user',$info);
        echo "<script>";
        echo "alert('完善信息成功！');";
        echo "window.location.href='http://www.test.com/book.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('完善信息失败！');";
        echo "window.location.href='../../user_info.php?phone=$phone&method=insert'";
        echo "</script>";
    }
}

?>