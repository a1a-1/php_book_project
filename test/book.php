<?php 
include "php/getsession.php";
include "php/conn.php";
$info=getSession('user');
$info=$info['info'];
// 获取session信息
$username=$info['username'];
$isLogin=$info['isLogin'];
$headPic = $info['headPic'];
$stu_num=$info['stu_num'];
$sql_type="select * from book_type";
$type_res=mysqli_query($conn,$sql_type);
$datas=[];
    foreach($type_res as $value){
        $datas[] = $value;
    }
$sql_book_info="select * from book order by sort desc";
$book_Info_res=mysqli_query($conn,$sql_book_info);
$book_info_datas=[];
foreach($book_Info_res as $value){
	$book_info_datas[] = $value;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="css/book.css" type="text/css" />
		
	</head>
	<body>
		<!-- 搜索框 -->
		<div class="top">
			<ul>
				<li><a href="#">我的乐购</a>
				<ul>
					<li><a href="#">我的足迹</a></li>
					<li><a href="order_item.php">我的订单</a></li>
					<li><a href="#">我的钱包</a></li>
				</ul>
				</li>
				<li><a href="shopping_cart.php">购物车</a></li>
				<li><a href="#">商品分类</a>
			    <ul>
					<li><a href="#">美妆</a></li>
					<li><a href="#">家电</a></li>
					<li><a href="#">数码</a></li>
					<li><a href="#">食品</a></li>
				</ul>
				</li>
				<li><a href="#">收藏夹</a></li>
				<li><a href="#">卖家中心</a></li>
				<li><a href="#">联系客服</a></li>
				<li><a href="book.php">首页</a></li>
			</ul>
		</div>
	<div class="clear"></div>
	<div class="header" >
			<div class="logo"><a href="#"><img src="images/booklogo.png"/></a></div>
			<input type="button" name="du" value="搜 索" class="zi">
        <p class="text">
		<?php if($isLogin){ ?>
						<div style="position: absolute;">
						<div class="loginInfo">
                                <a class="btn custom-btn custom-border-btn" role="button" aria-controls="offcanvasExample">
                                    <span><img src="<?=$headPic?>" alt="" style="width: 50px;height: 50px;border-radius: 50%;margin-right: 10px;">     </span>
                                    <div style="float: left; margin:20px;"><?=$username ?></div>
                                </a>
                                <ul class="loginCont ">
                                    <li><a href="#"></a></li>
                                    <li><a class="dropdown-item" href="user_info.php?phone=<?=$stu_num?>&method=update">修改个人信息</a></li>
                                    <li><a class="dropdown-item" href="/php/delsession.php">退出登录</a></li>
                                </ul>
                            </div>
						</div>
                            

   		<?php }else{ ?>
    						<a href="login.html" id="two">亲,请登录</a>
							<a href="register.html">&nbsp;&nbsp;免费注册</a></p>
        <?php    }?>
		
			      <input type="text" value="" class="ku">
	</div>
			
		</div>
		<!-- 标题 -->
		<div class="title">
			<div class="nav">
				<ul>
					<li selected="selected" id="good"><a href="#" >全部商品分类</a></li>
					<li><a href="#">乐购服饰</a></li>
					<li><a href="#">超市</a></li>
					<li><a href="#">生鲜</a></li>
					<li><a href="#">企业采购</a></li>
					<li><a href="#">闪购</a></li>
					<li><a href="#">自营电器</a></li>
					<li><a href="#">生活缴费</a></li>
					<li><a href="#">看病买药</a></li>
				</ul>
			</div>
		</div>
		<div></div>
		<div class="picture">
			<ul class="imgList">
				<li><img src="images/book.png" alt=""></li>
				<li><img src="images/book138.png" alt=""></li>
				<li><img src="images/book139.png" alt=""></li>
			</ul>
			<ol class="pointList">
				<li class="hover"><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
			</ol>
		</div>
		<div class="classify">
			<ul>
			<?php 
        		for($i=0;$i<count($datas);$i++){
         	?>
				<li><a href="#"><img src="images/book<?=$i+1?>.png" width="100" height="85"><?=$datas[$i]["name"]?></a></li>
				
			<?php 
				}
			?>
			</ul>
		</div>
			<div class="box1">
			<ul>
			<?php 
        		for($i=0;$i<4;$i++){
         	?>
		<li><a href="detail.php?id=<?=$book_info_datas[$i]["id"]?>"><img src="<?=$book_info_datas[$i]["img"]?>" width="190" height="190"><?=$book_info_datas[$i]["desc_info"]?>
		<p>￥<?=$book_info_datas[$i]["price"]?><span>￥<?=$book_info_datas[$i]["price"]*1.32?></span></p></a></li>
			<?php 
				}
			?>		
		</ul>	
		</div>
		<div class=" box2">
			<h1>今日特惠<span class="text">|&nbsp;&nbsp;&nbsp;每日低价·火速抢购</span></h1>
		</div>
		<div class="box3">
		<ul>
		<?php 
        		for($i=4;$i<12;$i++){
         	?>
		<li><a href="detail.php?id=<?=$book_info_datas[$i]["id"]?>"><img src="<?=$book_info_datas[$i]["img"]?>" width="190" height="190"><?=$book_info_datas[$i]["desc_info"]?>
		<p>￥<?=$book_info_datas[$i]["price"]?></p></a></li>
		<?php 
				}
			?>
		
		</ul>	
		</div>
		<div class="foot">
		    <p>©2014-2024 乐购网 版权所有 </p>
				 <p>遇到问题？<a href="#">请用电子邮件反馈</a></p>
		</div>
	</body>
	<!-- 注意加载js时，先加载css文件，因为js中获取元素用到了对应的类 -->
	<script src="js/book.js"></script>
</html>
<script>
        // 获取整个div元素
        var loginInfo=document.querySelector('.loginInfo');
        // 获取隐藏于显示的元素
        var loginCont =document.querySelector('.loginCont');
        // 添加过渡效果
        loginCont.style.transition="all 0.3s linear";
        loginInfo.onmouseover=function(){
            // 鼠标放上去
            loginCont.style.opacity= 1;
            loginCont.style.pointerEvents='auto';
            loginCont.style.top='50px';
        }
        loginInfo.onmouseout=function(){
            // 鼠标移开
            loginCont.style.opacity= 0;
            loginCont.style.pointerEvents='none';
            loginCont.style.top='60px';
        }
    </script>
 