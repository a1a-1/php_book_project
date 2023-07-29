<?php 
// 定义上传文件的函数
function uploadImg($headPic,$name){
    // 判断该文件是否上传成功
    if($headPic["error"]>0){
        echo "文件上传失败";
        // 使用switch()去详细说明上传失败的原因。
    }else{
        // 上传成功
        // 1.获取文件后缀名
        $type=strrchr($headPic['name'],'.');
        // 设置文件上传的路径
        $path = "../../images/".$name.$type;
        // 判断文件的类型是否是图片
        if(strtolower($type)==".png" ||  strtolower($type)==".jpg" || strtolower($type)==".gif"){
            // 将该图片移动到指定目录下,$path是图片新地址/路径
            move_uploaded_file($headPic["tmp_name"],$path);
        // 返回图片上传的新访问地址
        $img_url="http://www.test.com/images/".$name.$type;
        return $img_url;
        }else{
            echo "不是图片类型".$headPic["error"].$headPic;
        }
    }
}
?>