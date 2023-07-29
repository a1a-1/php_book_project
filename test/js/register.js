var  refershCode=document.getElementById("refershCode");
refershCode.onclick=function(){
    // console.log("a标签被点击了");
    //重新向服务器端的生成随机验证码文件再次发送请求
    // 1.获取img标签
    var img =document.getElementById("refershCode");
    // 2.给img标签的src属性重新赋值
    img.src="../php/codeImg.php?time="+new Date().getMilliseconds();
}
var code  =  document.getElementById("code");
var btn= document.getElementsByClassName("button")[0];
code.onchange=function(){
    //1.获取用户输入的字符串内容
    var codeValue=code.value;
    // 2.携带获取的字符串向服务器端发送一个http请求
    //实例化请求对象
    const xhr =new XMLHttpRequest();
    //设置请求方式
    xhr.open("POST","http://www.test.com/php/code.php?codeValue="+codeValue)
    //发送请求
    xhr.send()
    //监听请求结果
   xhr.onload=function(res){
        // console.log(res.currentTarget.response);
       var codeStatus=res.currentTarget.response;
       console.log(codeStatus);
        if(Number(codeStatus)){   
            document.getElementsByClassName("p_none")[0].style.display="none";
            btn.style.pointerEvents="all";
        }else{
            btn.style.pointerEvents="none";
        document.getElementsByClassName("p_none")[0].style.display="block";
        }
   }

    // 3.接受服务器端的校验结果
   

}