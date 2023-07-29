<?php
    include "php/conn.php";
    $sql_sel="select * from book";
    $res_sel=mysqli_query($conn,$sql_sel);
    // print_r($res_sel);
    $data = mysqli_fetch_all($res_sel);
    // print_r($res_sel);
    // print_r($data);
?>
<!-- html标签 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员操作平台</title>
</head>
<body>
    <div class="box1">
    <h1>图书后台管理系统</h1>
    <a style="display: block; margin-left: 120px; font-size:20px;text-decoration:none; margin-bottom: 10px;  " href="book_info.php?method=insert">添加书籍</a>
    <table border="1" cellspacing="0"  width = "80%">
        <thead>
            <td>序号</td>
            <td>书名</td>
            <td>作者</td>
            <td>类型</td>
            <td>图书数量</td>
            <td>价格</td>
            <td>简介</td>
            <td>图片</td>
            <td>操作</td>
        </thead>
        <?php 
        for($i=0;$i<$res_sel -> num_rows;$i++){
         ?>
        <tr>
            <td><?=$i+1?></td>
            <td><?=$data[$i][1] ?></td>
            <td><?=$data[$i][2] ?></td>
            <td><?=$data[$i][3] ?></td>
            <td><?=$data[$i][4] ?></td>
            <td><?=$data[$i][5] ?></td>
            <td><?=$data[$i][7] ?></td>
            <td><img src="<?=$data[$i][6] ?>"/></td>
            <td><input type="button" id="<?=$i ?>" class="<?=$data[$i][0] ?>" value="修改" />
                <input type="button" id="<?=$i ?>del"  class="<?=$data[$i][0] ?>" value="删除" />
            </td>
        </tr>
         <?php   
        }
        ?>
        
    </table>
    </div>
</body>
<style>
        .box1{
        background-color: #fff;
        border-radius: 20px;
        height: 100%;
        padding-bottom: 30px;
    }
    
    h1{
        text-align: center;
        padding-top: 20px;
        
    }
    h3{
        margin-top: 30px;
        text-align: center;
    }
    table{
        margin: 0 auto;
    }
    table tr td img{
        display: block;
        height: 100px;
        width: 100px;
        margin: 0 auto;
        border-radius: 50%;
    }
</style>
    <script>
        
        for(var i=0;i< <?=$res_sel -> num_rows ?>;i++ ){
            var xiugai=document.getElementById(i);
            var del =document.getElementById(i+"del");
            xiugai.onclick = function(){
                console.log(this.className);
                window.location.href="book_info.php?id="+this.className+"&method=update";
            }
            del.onclick =function(){
                console.log(this.className);
                window.location.href='php/bookInfo/del_book.php?id='+this.className;
            }
        }

    </script>
</html>