<?php
$id=$_GET['id'];
// print_r($id);
include "php/conn.php";
$sql_info="select * from book where id='$id'";
$info_res=mysqli_query($conn,$sql_info);

if($info_res -> num_rows){
	$book_info=mysqli_fetch_assoc($info_res);
	// print_r($book_info);
	$name=$book_info["name"];
	$author=$book_info["author"];
	$count=$book_info["count"];
	$price=$book_info["price"];
	$type=$book_info["type"];
	$img=$book_info["img"];
	$desc_info=$book_info["desc_info"];
}
include "php/getsession.php";
$info_1=getSession('user');
$info_1=$info_1['info'];
// 获取session信息
$isLogin=$info_1['isLogin'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="css/detail.css" type="text/css" />
	</head>
	<body>
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
		<div class="nav">
			<div class="left">
				<a href="#"><img style="width: 500px;height=500px;"  src="<?=$img?>"/></a>
			</div>
			
			<div class="right">
				<h2 style="margin: 10px; color:#343; font-size:36px;"><?=$name?></h2>
				<p style="margin: 10px; font-size: 18px;"><?=$desc_info?>更多<a href="#">查看></a></p>
				<div class="box">
					<h4>乐购价: <span class="price">￥<?=$price?></span></h4>
					<p class="text"><a href="#">降价通知</a></p>
					<div class="lefttext1">
						<p style="margin-top: 14px;">累计评价</p>
						<p><a href="#">50万+</a></p>
					</div>
                  <p class="text2" style=" margin-left: 60px; font-size:16px;">48小时发货·急速退款·7天包换·破损包赔</p>
				</div>
				<h4 >配送至：<a href="#">请选择：</a></h4>
				<div>
				<select class="common">
				    <option >河北省</option>
				    <option >北京市</option>
				    <option >辽宁省</option>
				    <option selected="selected">山东省</option>
				    <option >黑龙江省</option>
				    <option >甘肃省</option>
				    <option >广东省</option>
				</select>
				<select class="common">
				    <option >威海市</option>
				    <option >青岛市</option>
				    <option >济南市</option>
				    <option selected="selected">潍坊市</option>
				    <option >烟台市</option>
				    <option >枣庄市</option>
				    <option >菏泽市</option>
				</select>
				</div>
				<select class="common">
				    <option >奎文区</option>
				    <option >潍城区</option>
				    <option >寒亭区</option>
				    <option selected="selected">滨海区</option>
				    <option >寿光市</option>
				    <option >临朐县</option>
				    <option >昌邑市</option>
				</select>
				<p><a href="#" id="dis">详细地址</a></p>
				<div class="clear"></div>
				<p>由 官方 发货, 供应商提供售后服务.</p>
				<p>重量  不计重量</p>
				<div class="clear"></div>
				<div >
					<input type="button" name="du" value="立即购买" class="an1">
				</div>
				<div >
					<input type="button" id="add" name="du" value="加入购物车" class="an">
				</div>
			</div>
			<div class="clear"></div>
    <div class="pro">
		<div class="title1">
		    	<h2>为你推荐</h2>
		</div>

		<div class="con">
		    	<ul>
		        	<li><a href="#"><img src="images/11.jpg" width="215" height="185">&nbsp;&nbsp;【MI】21-34㎡适用 新2级能效 2匹 全直流变频空调 以旧换新 壁挂式空调<span class="price">&nbsp;&nbsp;￥2169.00</span></a></li>
		            <li><a href="#"><img src="images/12.jpg" width="215" height="185">&nbsp;&nbsp;【康佳】1.5匹 新能效 快速冷暖 一键节能 壁挂式卧室 空调挂机<span class="price">&nbsp;&nbsp;￥1999.00</span></a></li>
		            <li><a href="#"><img src="images/13.jpg" width="215" height="185">&nbsp;&nbsp;【MI】小米（MI）1.5匹 新一级能效 变频冷暖 智能自清洁 <span class="price">&nbsp;&nbsp;￥3201.99</span></a></li>
		            <li><a href="#"><img src="images/14.jpg" width="215" height="185">&nbsp;&nbsp;【格力】1.5匹 云佳 三级能效 变频冷暖 自清洁 壁挂式卧室空调挂机<span class="price">&nbsp;&nbsp;￥4922.80</span></a></li>
		            <li><a href="#"><img src="images/5.png" width="215" height="185">&nbsp;&nbsp;【格力】新一级能效 静悦 1.5匹 变频 冷暖挂式空调挂机 智能 自清洁<span class="price">&nbsp;&nbsp;￥2559.00</span></a></li>
		            <li><a href="#"><img src="images/12.jpg" width="215" height="185">&nbsp;&nbsp;【奥克斯】1.5匹 云佳 新一级能效 变频冷暖 自清洁 壁挂式空调挂机 <span class="price">&nbsp;&nbsp;￥2999.00</span></a></li>
		            <li><a href="#"><img src="images/14.jpg" width="215" height="185">&nbsp;&nbsp;【格力】空调 小家智能生态 1.5匹 云锦Ⅱ 新1级能效 壁挂式卧室挂机<span class="price">&nbsp;&nbsp;￥3699.00</span></a></li>
		            <li><a href="#"><img src="images/11.jpg" width="215" height="185">&nbsp;&nbsp;【MI】1.5匹 风酷 新一级能效 变频冷暖 自清洁 壁挂式空调挂机 智能家电<span class="price">&nbsp;&nbsp;￥1999.00</span></a></li>
		        </ul>
		    </div>
		</div>
	</div>
		<div class="foot">
		    <p>©2014-2022 乐购网 版权所有 </p>
				 <p>遇到问题？<a href="#">请用电子邮件反馈</a></p>
		</div>
	</body>
</html>
<script>
	var add=document.getElementById("add");
	console.log(add.value);
	add.onclick =function(){
		if( '<?=$isLogin?>' == '1'){
			window.location.href='http://www.test.com/php/add_order.php?id=<?=$id?>';
		}else{
			alert("请先登录账号！");
		}
	}
</script>