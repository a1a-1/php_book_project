<?php
    // setsession.php
    // 设置session
    function setSession($session_name,$session_info){
        session_start(["name"=>$session_name]);
        // 存信息
        $_SESSION['info']=$session_info;
    }
?>