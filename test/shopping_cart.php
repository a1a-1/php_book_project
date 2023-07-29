<?php
// 获取session信息
	
	$u_id  =$_GET['add'];
	$u_id2  =$_GET['jian'];
	
	include "php/conn.php";
	include "php/getsession.php";
	$info=getSession('user');
    $info=$info['info'];
    // 获取session中的用户id
    $user_id=$info['user_id'];
	$arr=$info['cart'];
	// print_r($arr);
$sql_cart="select * from order_form where user_id = '$user_id'";
$book_cart_res=mysqli_query($conn,$sql_cart);
$book_cart_datas=[];
foreach($book_cart_res as $value){
	$book_cart_datas[] = $value;
}
$sum=0;
foreach ($book_cart_datas as $book_info):
	$sum=$sum+$book_info['number']*$book_info['price'];
endforeach;
if($arr !=null){
	foreach ($arr as $i):
		$sum=$sum-$book_cart_datas[$i]['number']*$book_cart_datas[$i]['price'];
	endforeach;

}
	
if($sum<0){
	$sum=0;
}

?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/shopping.css"/>
		
	</head>
	<body>
		<div class="title">
			<div class="center">
				<img class="left" src="images/booklogo.png" >
				<a href="book.php"><h3>首页</h3></a>
				<div class="right">
					<p class="img_1">🔍  <span>></span>
					</p>
					<input class="search_1" type="search" size="40"/>
					<input class="search_2" type="button"  value="搜索" />
					
				</div>
			</div>
		</div>
		<div class="content">
			<div id="">
				&sbquo;
			</div>
			<div class="center_1">
				<div class="center_title">
					<p class="s_left" style="margin-left: 60px;">购物车(全部<?=count($book_cart_datas) ?>条)</p>
					<input class="s_right_1" id="btn_order" type="button"  value="结算" />
				<p class="s_right">已选商品(不含运费)<span><?=$sum?></span></p>
				</div>
				<div class="center_title_2">
					<div class="info">
						商品信息
					</div>
					<div class="price">
						单价
					</div>
					<div class="price">
						数量
					</div>
					<div class="price_2">
						金额
					</div>
					<div class="price">
						操作
					</div>
				</div><!-- 列表头 -->
				<div class="s_item">
					
					<div class="s_item_title">
						<span class="s_title">全店包邮</span> <span class="color">全场8折优惠</span>
					</div>
					<?php 
        				for($i=0;$i<count($book_cart_datas);$i++){
         			?>

					<div class="s_item_1">
						<!-- first -->
						<div class="img_first">
							<img style="width: 36px;height: 36px;margin-top: 24px;margin-right: 20px;float: left;" 
							 src="
							 <?php
							 if (in_array($i,$arr)){
								?>images/对号3.png
							 <?php }else{
								?>
								images/对号2.png
								<?php
							 }   ?>
							 " alt="<?php if (in_array($i,$arr)){?>false<?php }else{?>true<?php }?>" class="<?=$i ?>" id="img_duihao<?=$i ?>">
							<img class="img" src="<?=$book_cart_datas[$i]['img'] ?>" >
							<p style=" font-size:18px;"><?=$book_cart_datas[$i]['name'] ?></p>
						</div>
						<div class="img_first_1">
							<p class="str_1">￥<?=$book_cart_datas[$i]['price']*1.4 ?></p>
							<p class="str_2">￥<?=$book_cart_datas[$i]['price'] ?></p>
						</div>
						<div class="img_first_1">
							<a class="a_weight_2" href="php/cart_change.php?info=jian&id=<?=$book_cart_datas[$i]['id']?>&number=<?=$book_cart_datas[$i]['number'] ?>">-</a>
							<input class="d_weight2" type="text" name="number" value="<?=$book_cart_datas[$i]['number'] ?>" />
							<a class="a_weight_1" href="php/cart_change.php?info=add&id=<?=$book_cart_datas[$i]['id']?>" >+</a>
						</div>
						<div class="img_first_1">
							<p class="str_3">￥<?=$book_cart_datas[$i]['number']*$book_cart_datas[$i]['price'] ?></p>
						</div>
						
						<div class="img_first_2">
							<p class="str_4"><a href="php/cart_change.php?info=del&id=<?=$book_cart_datas[$i]['id']?>">删除</a></p>
						</div>
						<!-- end -->
					</div>

					<?php   
        					};
        			?>		

				</div>
				<div class="center_title center_title_1">
				<p class="s_left">购物车(全部<?=count($book_cart_datas) ?>条)</p>
				<input class="s_right_1" type="button" id="btn_order2"  value="结算" />
				<p class="s_right">已选商品(不含运费)<span><?=$sum?></span></p>
				</div>
				<script>
		<?php
			for($i=0;$i<count($book_cart_datas);$i++){
				
				
		?>
		var duihao=document.getElementById("img_duihao<?=$i?>");
		// console.log(duihao.alt);
		// console.log(duihao.className);
		duihao.onclick =function(){	
			
			if(this.alt == 'true'){
				this.alt = "false";
				window.location.href='http://www.test.com/php/chuanshu/add_xiugai.php?item='+this.className
				
				
			}else{
				console.log(this.alt);
				this.alt = "true";
				window.location.href='http://www.test.com/php/chuanshu/jian_xiugai.php?item='+this.className
				
			}
		}
		<?php
			};
		?>
		var btn_order=document.getElementById("btn_order");
		var btn_order2=document.getElementById("btn_order2");
		btn_order.onclick =function(){
			window.location.href='http://www.test.com/order.php?sum='+<?=$sum?>;
		};
		btn_order2.onclick =function(){
			window.location.href='http://www.test.com/order.php?sum='+<?=$sum?>;
		};
	</script>

			
			
			</div>
			
		</div>
		<div class="footer">
			
		</div>
	</body>
	
</html>
