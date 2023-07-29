<?php
    $sum=$_GET['sum'];
	// print_r($phone);
	include "php/conn.php";
        // 获取手机号（从session中获取）
        include 'php/getsession.php';
        $info = getSession('user');
		if($info['info']['stu_num']!=null){
			$phone = $info['info']['stu_num'];
		}
        $user_id=$info['info']['user_id'];
	    $arr=$info['info']['cart'];
        // print_r($info);
        $sql_sel="select * from user_info where phone = '$phone' ";
        $res_sel = mysqli_query($conn,$sql_sel);
        // print_r($res_sel);
        
        if($res_sel -> num_rows){
            $stu_info=mysqli_fetch_assoc($res_sel);
            // 开始获取每一个信息
            $name = $stu_info['name'];
            $age = $stu_info['age'];
            $gender = $stu_info['gender'];
            $city = $stu_info['city'];
            $desc = $stu_info['desc_info'];
            $headPic = $stu_info['headPic'];
        }
        // 查询该账号的所有订单
        $sql_cart="select * from order_form where user_id = '$user_id'";
        $book_cart_res=mysqli_query($conn,$sql_cart);
        $book_cart_datas=[];
        foreach($book_cart_res as $value){
            $book_cart_datas[] = $value;
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单页面</title>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/order.css">
</head>

<body>
    <div class="title">
        <div class="center">
            <img class="left" src="images/booklogo.png" >
            <a href="book.php"><h3 style="margin-top: 30px;">首页</h3></a>
            <div class="right">
                <p class="img_1">🔍  <span>></span>
                </p>
                <input class="search_1" type="search" size="40"/>
                <input class="search_2" type="button"  value="搜索" />
                
            </div>
        </div>
    </div>
    <!-- 主题内容区域 -->
    <div class="main">
        <!-- 用户信息区域 -->
        <h3 style="margin-bottom: 10px;">确认地址</h3>
        <div class="user_msg pannel">
            <div class="location">
                <i class="iconfont icon-location"></i>
            </div>
            <div class="user">
                <div class="top">
                    <h4><?=$name?></h4>
                    <span><?=$phone?></span>
                </div>
                <div class="bottom">
                    <span><?=$city?></span>
                </div>
            </div>
            <div class="more">
                <i class="iconfont icon-more"></i>
            </div>
        </div>
        <h3 style="margin-bottom: 10px;margin-top: 8px;">确认订单信息</h3>
        <!-- 商品信息区域 -->

        <?php 
        	for($i=0;$i<count($book_cart_datas);$i++){
                if (in_array($i,$arr)){

                }else{

               
        ?>
        <div class="pannel goods">
            <div class="pic">
                <img src="<?=$book_cart_datas[$i]['img']?>" alt="">
            </div>
            <div class="goods_info">
                <h4><?=$book_cart_datas[$i]['name']?> 
                    
                </h4>
                <p>
                    <span>7天无理由退货</span> 
                    <span>7天保价</span></p>
                <div class="price">
                    <span class="red">¥<i><?=$book_cart_datas[$i]['price']?></i></span>
                    <span>¥<i><?=$book_cart_datas[$i]['price']*1.4 ?></i></span>
                </div>
        </div>
        <div class="count">
            <i class=" iconfont icon-x"></i>
            <span><?=$book_cart_datas[$i]['number'] ?></span>
        </div>
    </div>

    <?php   
        } };
    ?>	
    <!-- 其他信息区域 -->
    <div class="other pannel">
        <div>
            <h4>配送方式</h4>
            <p class="wenzi">希望可以尽快发货，谢谢~</p>
            <p>顺丰快递</p>
        </div>
        <div>
            <h4>支付方式:</h4>
            <select class="iconfont icon-more">
                <option selected="selected">支付宝</option>
				    <option >微信</option>
				    <option >银行卡</option>
				    <option >其他方式</option>

				</select>
            <!-- <p>支付宝 <i class="iconfont icon-more"></i></p> -->
        </div>
    </div>
    <!-- 商品其他信息区域 -->
    <div class="goods_rest pannel">
        <div>
            <h4>商品总价</h4>
            <p>￥<i><?=$sum?></i></p>
        </div>
        <div>
            <h4>运费</h4>
            <p>￥<i>6</i></p>
        </div>
        <div>
            <h4>商品总价</h4>
            <p class="red">￥<i><?=$sum+6?></i></p>
        </div>
    </div>
    <!-- 底部支付区域 -->
    <div class="pay">
        <div class="left">
            合计：<span class="red">￥<i><?=$sum+6?></i></span>
        </div>
        <div class="right"><a href="php/pay.php">去支付</a></div>
    </div>
</body>

</html>