<?php
	$id = $_GET["id"];
	// print_r($id);
	include "php/conn.php";
    // 接收上个页面传递的参数
    $method=$_GET['method'];
    if($method == 'update'){
        // 更新操作
        $sql_sel="select * from book where id = '$id' ";
        $res_sel = mysqli_query($conn,$sql_sel);
        // print_r($res_sel -> num_rows);
        if($res_sel -> num_rows){
            $stu_info=mysqli_fetch_assoc($res_sel);
            // 开始获取每一个信息
            $name = $stu_info['name'];
            $author = $stu_info['author'];
            $type = $stu_info['type'];
            $count = $stu_info['count'];
            $price = $stu_info['price'];
            $img = $stu_info['img'];
            $desc_info = $stu_info['desc_info'];
            $sort = $stu_info['sort'];

        }
    }else{
        // 完善操作
        $name = '';
        $author = '';
        $type = '';
        $count = '';
        $price = '';
        $img = 'images/1.png';
        $desc_info = '';
        $sort = '';
        
    }
?>

<!DOCTYPE html>
<html>

<head>
  <title>HOME</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link href="css/book_form.css" rel='stylesheet' type='text/css' />

</head>

<body>
  <header>
    <h1>图书信息管理</h1>
  </header>
  <div class="w3ls-contact">

    <!-- form starts here -->
    <form action="/php/bookInfo/insertInfo.php?id=<?=$id?>&method=<?=$method?>" method="post" data-toggle="validator" enctype="multipart/form-data">
    <div class="agile-field-txt">
        <label>
          <img style="width: 100px; height: 100px; display:inline-block;" src="<?=$img?>" alt="">
          图书图片: <input type="file"   name="headPic"></label>
          
      </div>
      <div class="agile-field-txt">
        <label>
          书名:</label>
        <div class="mr_agilemain">
          <div class="left-wthree">
            <input type="text" name="name" value="<?=$name?>" placeholder="书名 " required="">
          </div>            
          
        </div>
      </div>
      
      <div class="agile-field-txt">
      
        <label>
          作者姓名:</label>
        <input type="text" name="author"  value="<?=$author?>" placeholder="作者" required="" />
      </div>
      <div class="agile-field-txt">
        <label>
          图书类型:</label>
        <input type="text" name="type" value="<?=$type?>"  placeholder="图书类型 " required="" />
      </div>
      <div class="agile-field-txt">
        <label>
          图书库存数量:</label>
        <input type="text" name="count" value="<?=$count?>"   placeholder="图书库存量 " required="" />
      </div>
      <div class="agile-field-txt">
        <label>
          价格:</label>
        <input type="text" name="price" value="<?=$price?>"  placeholder=" " required="" />
      </div>
      <div class="agile-field-txt">
        <label>
          排序等级:</label>
        <input type="text" name="sort" value="<?=$sort?>"  placeholder=" " required="" />
      </div>


      <div class="agile-field-txt">
        <label>
          图书简介</label>
         <textarea name="desc_info" placeholder="请输入图书的有关信息" required=""><?=$desc_info?></textarea>
      </div>
      <div class="w3ls-contact  w3l-sub">
        <input type="submit"  value="保存图书信息">
      </div>

    </form>
  </div>
</body>

</html>