<?php
include "conn.php";
$id=$_GET['id'];
$sql_add="delete from user_info  where id = '$id'";
mysqli_query($conn,$sql_add);
echo "<script>";
echo "alert('删除用户信息成功！');";
echo "window.location.href='http://www.test.com/user_list.php'";
echo "</script>";

?>