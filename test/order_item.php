<?php
    	include "php/conn.php";
        include "php/getsession.php";
        $info=getSession('user');
        $info=$info['info'];
        // 获取session中的用户id
        $user_id=$info['user_id'];
        $username=$info['username'];
    $sql_cart="select * from order_formed where user_id = '$user_id'";
    $book_cart_res=mysqli_query($conn,$sql_cart);
    $book_cart_datas=[];
    foreach($book_cart_res as $value){
        $book_cart_datas[] = $value;
    }
?>
<!-- html标签 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单记录</title>
</head>
<body>
    <h1>用户订单记录</h1>
    <a style="display: block; margin-left: 160px; font-size:20px;text-decoration:none; margin-bottom: 10px; " href="book.php">首页</a>

        <?php 
            // for($i=0;$i<count($book_cart_datas);$i++){
            for($i=count($book_cart_datas)-1;$i>=0;$i--){
         ?>
    <div class="box1">
        <table  cellspacing="0"  width = "80%">
            <tr> 
            <td rowspan="4"><img src="<?=$book_cart_datas[$i]["img"] ?>"/></td>
            </tr>
            <tr>
            <td>订单号：<?=$book_cart_datas[$i]["order_id"] ?></td>
            <td>书名：<?=$book_cart_datas[$i]["name"] ?></td>
            
            </tr>
            <tr> 
            <td>购买者：<?=$username ?></td>
            <td>价格：<?=$book_cart_datas[$i]["price"] ?> 元</td>
            
            </tr> 
            <tr>
             <td>图书数量：<?=$book_cart_datas[$i]["number"] ?> 套</td> 
             <td>购买时间：<?=$book_cart_datas[$i]["alter_time"] ?></td>  
            </tr>
        </table>
    </div> 
         <?php   
        } 
        ?>
        
    
</body>
<style>
    .box1{
        background-color:  #eee;
        width: 80%;
        border-radius: 15px;
        margin: auto auto;
        margin-top: 10px;
        height: 120px;
        border: 1px solid black;
    }
    h1{
        text-align: center;
        margin-top: 30px;
    }
    h3{
        margin-top: 30px;
        text-align: center;
    }
    table{
        margin: 10px auto;
        
        
        
    }
    table tr td{
        text-align:left;
        
    }
    table tr td img{
        display: block;
        height: 100px;
        width: 100px;
        margin: 1 auto;
        
        border-radius: 10%;
    }

</style>
</html>
