<?php
	$phone = $_GET["phone"];
	// print_r($phone);
	include "php/conn.php";
    // 接收上个页面传递的参数
    $method=$_GET['method'];
    if($method == 'update'){
        // 更新操作
        // 获取学生的学号（从session中获取）
        include 'php/getsession.php';
        $info = getSession('user');
		if($info['info']['stu_num']!=null){
			$phone = $info['info']['stu_num'];
		}
        $sql_sel="select * from user_info where phone = '$phone' ";
        $res_sel = mysqli_query($conn,$sql_sel);
        // print_r($res_sel -> num_rows);
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
    }else{
        // 完善操作
        $name = '';
        $age = '';
        $gender = '';
        $city = '';
        $desc = '';
        $headPic = 'images/1.png';
        
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link href="css/user_info.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<div class="signupform">
<h1>个人信息完善页面</h1>
	<div class="container">
		
		<div class="agile_info">
			<div class="w3l_form">
				<div class="left_grid_info">
					<img style="margin-left: 10px;" src="<?=$headPic?>" alt="">
					<h4 >头像</h4>
					<p> 本网站是一个在线提供图书购买的平台。用户可以在图书网站上浏览广泛的图书目录，找到自己感兴趣的图书，并进行在线购买。
						这些网站通常提供多种图书类别和主题，以满足不同读者的需求。</p>
				
				</div>
			</div>
			<div class="w3_info">
				<h2>请输入个人信息</h2>
				<p>我们将根据您的个人信息推荐更适合您的商品</p>
						<form action="/php/infoEditor/insertInfo.php" method="post" data-toggle="validator" enctype="multipart/form-data">
						修改头像：
							<input type="file" name="headPic">
							
						<div class="input-group">
							
							<input type="text" name="name" placeholder="性名" value="<?=$name?>" required=""> 
						</div>
						<div class="input-group">
							<input type="text"name="age"  placeholder="年龄" value="<?=$age?>" required=""> 
						</div>
						
						<?php if($gender=='女'){ ?>
							<div class="radio">
								<label >
									<input type="radio" name="gender" value="男"  required> <span style="position: relative; top: -22px;left: 36px;">男</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="gender" value="女" checked required><span style="position: relative; top: -22px;left: 36px;">女</span>
								</label>
							</div>		
        				<?php } else{?>
							<div class="radio">
								<label >
									<input type="radio" name="gender" value="男" checked required> <span style="position: relative; top: -22px;left: 36px;">男</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="gender" value="女"  required><span style="position: relative; top: -22px;left: 36px;">女</span>
								</label>
							</div>
						<?php } ?>
							
						
						<div class="input-group" style="clear: left;">
							<input type="text" name="city" value="<?=$city?>" placeholder="收货地址" required=""> 
						</div>
						<div class="input-group">
							<input type="text" name="phone" placeholder="手机号" required="" value="<?=$phone?>" readonly>
						</div>
							<textarea name="desc"  id="" style="font-size: 18px; padding: 10px;" placeholder="个人介绍" cols="46" rows="5"><?=$desc?></textarea>
						
							<button class="btn btn-danger btn-block" type="submit">保存信息</button >  

					</form>
			</div>
			<div class="clear"></div>
			</div>
			
		</div>
		<div class="footer">
 </div>
	</div>
	</body>
</html>