<?php 
    // 获取缓存
    function getSession($session_name){
        session_start(["name" => $session_name]);
        // echo "<pre>";
        // print_r($_SESSION);
        return $_SESSION;
    }
    // getSession('user');
?>