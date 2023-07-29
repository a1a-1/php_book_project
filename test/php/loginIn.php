<?php
    // 1.连接数据库。
    include 'conn.php';
    // 2.获取属性值。
    $username = $_POST["phone"];
    $password = $_POST['password1'];
    // 3.根据学号查询它对应的密码。
    // 书写sql语句
    $sql_sel ="select password from user where phone = '$username'";
    // 将sql语句提交到数据库进行执行
    $res_sel=mysqli_query($conn,$sql_sel);
    // 判断查询结果
    if($res_sel->num_rows){
        // 查询到结果，将此结果进行解析
        $res_sel=mysqli_fetch_assoc($res_sel);
        // echo "<pre>";
        // print_r($res_sel['password']);
    // 4.将查询所得密码跟用户表单进行密码对比。
        if($res_sel['password']==$password){
            if($username == 'admin'){

                include "setsession.php";
            $info = [
                    "username"=> null,
                    "isLogin" => 1,
                    "headPic" => null,
                    "stu_num" => null,
                    "user_id" => 1,
                    "cart" => array()
            ];
                setSession('user',$info);

                echo "<script>";
                echo "alert('管理员登录成功！');";
                echo "window.location.href='../manage_info.php'";
                echo "</script>";
            }else{
                // 5.如果两个密码一致,则登录成功,否则登录失败。
            $sql_name ="select * from user_info where phone = '$username'";
            $res_name=mysqli_query($conn,$sql_name);
            if($res_name -> num_rows){
                $name=mysqli_fetch_assoc($res_name);
                // 设置session
                include "setsession.php";
            $info = [
                    "username"=> $name['name'],
                    "isLogin" => 1,
                    "headPic" => $name['headPic'],
                    "stu_num" => $name['phone'],
                    "user_id" => $name['id'],
                    "cart" => array()
            ];
                setSession('user',$info);
            }else{
                echo "<script>";
            echo "alert('请你完善个人信息！');";
            echo "window.location.href='../user_info.php?phone=$username&method=insert'";
            echo "</script>";
            }
           
            echo "<script>";
            echo "alert('登录成功！');";
            echo "window.location.href='../book.php'";
            echo "</script>";
            }

            
        }else{
            // 否则登录失败
            echo "<script>";
            echo "alert('账号或密码错误！');";
            echo "window.location.href='../login.html'";
            echo "</script>";
        }

    }else{
        // 没查到结果
        echo "<script>";
        echo "alert('当前帐号未注册，请先注册！');";
        echo "window.location.href='../register.html'";
        echo "</script>";
    }

?>