<?php
    include "conn.php";
    $id=$_GET["id"];
    $sql_book_info="select * from book where id = '$id'";
    $book_Info_res=mysqli_query($conn,$sql_book_info);
    if($book_Info_res -> num_rows){
        $book_info=mysqli_fetch_assoc($book_Info_res);
        // print_r($book_info);
        $name=$book_info["name"];
        $count=$book_info["count"];
        $price=$book_info["price"];
        $img=$book_info["img"];
        $time = date("Y-m-d H:i:s");
        // 获取当前登录的用户
        include "getsession.php";
        $info=getSession('user');
        $info=$info['info'];
        // 获取session中的用户id
        $user_id=$info['user_id'];
        print_r($info);

        // 判断书籍的剩余数量，有时间就写，没时间就不写

        // 判断是否已经添加过该书籍
        $name_exist="select * from order_form where name = '$name' and user_id = '$user_id'";
        $res_exist=mysqli_query($conn,$name_exist);
        print_r($res_exist);
        if($res_exist ->num_rows){
            $update_order = "update order_form set number = number+1 where name = '$name' and user_id = '$user_id'";
            mysqli_query($conn,$update_order);
            echo "<script>";
            echo "alert('再次添加成功！');";
            echo "window.location.href='../detail.php?id=$id'";
            echo "</script>";
        }else{
            $book_order="insert into order_form value(default,'$name',1,'$price','$user_id','$time','$img')";
            mysqli_query($conn,$book_order);
            echo "<script>";
            echo "alert('添加购物车成功！');";
            echo "window.location.href='../detail.php?id=$id'";
            echo "</script>";
        }
    }
?>