<?php
// 这个id代表的是第几个元素,不是数据库的id值
$id=$_GET['item'];
session_start(['name'=>'user']);
print_r($_SESSION["info"]["cart"]);

$key=array_search($id,$_SESSION["info"]["cart"]);
unset($_SESSION["info"]["cart"][$key]);
        echo "<script>";
        echo "window.location.href='../../shopping_cart.php?jian=$id'";
        echo "</script>";
?>