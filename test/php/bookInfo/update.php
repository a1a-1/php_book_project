<?php
//用于修改信息的函数
function update($conn,$id,$name,$author,$type,$count,$price,$desc_info,$sort,$headPic){
    $sql = "update book set name ='$name',author = '$author', type = '$type', count='$count',
    desc_info = '$desc_info',price = '$price',img = '$headPic',sort= '$sort' where id = '$id'";
    $res=mysqli_query($conn,$sql);
    // print_r($res);
    if($res){
        // 获取session后不要把他赋值给变量，这样就没办法修改session信息了，要直接$_SESSION["info"]["username"]这样使用。      
        echo "修改成功";
        echo "<script>";
        echo "alert('更新信息成功！');";
        echo "window.location.href='../../book_list.php'";
        echo "</script>";

        
    }else{
        echo "修改失败";
        echo "<script>";
        echo "alert('更新信息失败！');";
        echo "window.location.href='../../book_list.php'";
        echo "</script>";
    }

}