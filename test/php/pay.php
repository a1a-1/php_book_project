<?php
include "conn.php";
// 获取手机号（从session中获取）
include 'getsession.php';
$info = getSession('user');
if($info['info']['stu_num']!=null){
    $phone = $info['info']['stu_num'];
}
$user_id=$info['info']['user_id'];
$arr=$info['info']['cart'];
// 查询该账户的所有订单
    $sql_cart="select * from order_form where user_id = '$user_id'";
    $book_cart_res=mysqli_query($conn,$sql_cart);
    $book_cart_datas=[];
    foreach($book_cart_res as $value){
        $book_cart_datas[] = $value;
    }
    for($i=0;$i<count($book_cart_datas);$i++){
        if (in_array($i,$arr)){

        }else{
            $time = date("Y-m-d H:i:s");
            // $order_no = md5(uniqid(mt_rand(), true));
            $order_no = date('YmdHis') . rand(1000, 9999);
            $book_name=$book_cart_datas[$i]["name"];
            $book_number=$book_cart_datas[$i]["number"];
            $book_price=$book_cart_datas[$i]["price"]*$book_number;
            $book_img=$book_cart_datas[$i]["img"];

            $book_order="insert into order_formed value(default,'$book_name','$book_number','$book_price','$user_id','$time','$book_img','$order_no')";
            mysqli_query($conn,$book_order);

            $order_form_id=$book_cart_datas[$i]["id"];
            print_r($order_form_id);
            $del_cart="delete from order_form where id = '$order_form_id'";
            mysqli_query($conn,$del_cart);
        }
    };
    $_SESSION['info']['cart']=array();
    echo "<script>";
    echo "alert('支付成功！');";
    echo "window.location.href='../shopping_cart.php'";
    echo "</script>";

?>