<?php
// 这个id代表的是第几个元素,不是数据库的id值
$id=$_GET['item'];
session_start(['name'=>'user']);
print_r($_SESSION);
// $_SESSION["info"]["cart"]=array();
$_SESSION["info"]["cart"][]=$id;
print_r($_SESSION);

        echo "<script>";
        echo "window.location.href='../../shopping_cart.php?add=$id'";
        echo "</script>";
?>