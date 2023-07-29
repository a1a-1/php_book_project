<?php
include "php/getsession.php";
$a=getSession('user');
// print_r($a);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>信息管理</title>
    <link rel="stylesheet" href="css/manage_info.css" type="text/css" />
</head>
<body>
    <div class="context">
          <div class="top">
            <h1>管理员后台</h1>
          </div>
        <div class="left">
        <a href="#"><h3>用户管理</h3></a>
        <a href="#"><h3>书单管理</h3></a>
        <a href="php/delsession.php"><h3>退出账户</h3></a>
        </div>
        <div class="right">
            <iframe id="info" src="http://www.test.com/user_list.php" height="642px" width="100%" frameborder="0"></iframe>
        </div>
    </div>
</body>
</html>

<script>
    var a=document.getElementsByTagName("a");
    var info=document.getElementById("info");
    a[0].onclick =function(){
        info.src="http://www.test.com/user_list.php";
    }
    a[1].onclick =function(){
        info.src="http://www.test.com/book_list.php";
    }
    
</script>
<style>

</style>