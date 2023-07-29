<?php
//用于修改信息的函数
function update($conn,$name,$gender,$age,$phone,$city,$desc,$headPic){
    $sql = "update user_info set name ='$name',age = '$age', gender = '$gender', city='$city',
    desc_info = '$desc',headPic = '$headPic' where phone = '$phone'";
    $res=mysqli_query($conn,$sql);
    // print_r($res);
    if($res){
        // 获取session后不要把他赋值给变量，这样就没办法修改session信息了，要直接$_SESSION["info"]["username"]这样使用。
        session_start(['name'=>'user']);
        print_r($_SESSION);
        $_SESSION["info"]["username"]=$name;
        $_SESSION['info']["headPic"]=$headPic;
        
        echo "修改成功";
        echo "<script>";
        echo "alert('更新信息成功！');";
        
        // print_r($a);
        if($_SESSION["info"]["user_id"]==1){
            echo "window.location.href='http://www.test.com/user_list.php'";
            echo "</script>";
        }
        // 修改session文件中的信息
        
        echo "window.location.href='http://www.test.com/book.php'";
        echo "</script>";
        // print_r($b["info"]);
    }else{
        echo "修改失败";
        echo "<script>";
        echo "alert('更新信息失败！');";
        echo "window.location.href='../../user_info.php?phone=$phone&method=update'";
        echo "</script>";
    }

}