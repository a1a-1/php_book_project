<?php
    $info =$_GET["info"];
    $id = $_GET["id"];
    $number =$_GET["number"];
    include "conn.php";
    function update_jian($conn,$id,$number){
        if($number==1){
            echo "<script>";
            echo "alert('这剩下一条数据，无法再减少了！');";
            echo "window.location.href='http://www.test.com/shopping_cart.php'";
            echo "</script>";
        }else{
            $sql_jian="update order_form set number = number-1 where id = '$id'";
            mysqli_query($conn,$sql_jian);
            echo "<script>";
            echo "window.location.href='http://www.test.com/shopping_cart.php'";
            echo "</script>";
        }
        
    }
    function update_add($conn,$id){
        $sql_add="update order_form set number = number+1 where id = '$id'";
        mysqli_query($conn,$sql_add);
        echo "<script>";
        echo "window.location.href='http://www.test.com/shopping_cart.php'";
        echo "</script>";
    }
    function update_del($conn,$id){
        $sql_add="delete from order_form  where id = '$id'";
        mysqli_query($conn,$sql_add);
        echo "<script>";
        echo "window.location.href='http://www.test.com/shopping_cart.php'";
        echo "</script>";
    }
    if($info == 'jian'){
        update_jian($conn,$id,$number);
    }else if($info == 'add'){
        update_add($conn,$id);
        echo "被执行了";
    }elseif($info == 'del'){
        update_del($conn,$id);
    }
    
?>