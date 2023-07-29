<?php
    // 删除缓存
    session_start(["name"=>'user','cookie_lifetime' =>time()-1]);
    session_destroy();
    // session_start(["name"=>'admin','cookie_lifetime' =>time()-1]);
    include "getsession.php";
    // $_SESSION["info"] =[];
    session_destroy();
    $_SESSION =[];
    if($_SESSION != []){
        echo "<script>";
        echo "alert('退出登录失败！');";
        echo "window.location.href='../book.php'";
        echo "</script>";
    }else{
        // $a=getSession('admin');
        $b=getSession('user');
        print_r($b);
        echo "<script>";
        echo "alert('退出登录成功！');";
        echo "window.location.href='../book.php'";
        echo "</script>";
    }


?>
<!-- <script>
    alert("退出登录成功~");
    window.location.href='../home.php';
</script> -->