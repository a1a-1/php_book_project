 // 轮播图
    // 1.自动轮播 autoplay
    // 设置索引的默认值
    let currentIndex = 0
    // 获取元素
    let imgList = document.querySelector('.imgList');
    let length =document.querySelectorAll('.imgList img').length;
    let pointList = document.querySelectorAll('.pointList li');
    console.log(imgList);
    console.log(length);
    console.log(pointList);
    // 添加过度效果
    imgList.style.transition = 'all 0.8s linear';

    // 创建图片切换的函数
    function move(currentIndex){
        imgList.style.left = -1000 * currentIndex + 'px';
    }
    // 如何自动执行切换功能
    // 创建定时器
    let timer = setInterval(function(){
        if(currentIndex < length -1){
            currentIndex++
        }else{
            currentIndex=0;
        }
        move(currentIndex);
        point(currentIndex);
    },3000);
    // 定义一个重启定时器的函数
    function timerAgin(){
        timer = setInterval(function(){
        if(currentIndex < length -1){
            currentIndex++
        }else{
            currentIndex=0;
        }
        move(currentIndex);
        point(currentIndex);
    },3000);
    }
    // 定义指示点的切换函数
    function point(currentIndex){
        // let a =document.querySelector(".pointList .hover");
        // a.classList.remove('hover');
        // pointList[currentIndex].classList.add('hover');
        for(let i=0; i<pointList.length;i++){
            if(i==currentIndex){
                pointList[i].classList.add('hover');
            }else{
                pointList[i].classList.remove('hover');
            }
        }
    }
    // 如何让鼠标放在指示点上，让它显示对应的图片
    // onmouseover,obmouseout
    // 数组.forEach() 给数组中的每一个元素都去执行一次代码
    pointList.forEach(function(item,index){
            item.onmouseover = function(){
                // 鼠标放上去，显示对应的图片,停掉定时器
                currentIndex =index;
                move(currentIndex);
                point(currentIndex);
                clearInterval(timer);
            }
            item.onmouseout = function(){
                // 鼠标移开,重启定时器
                timerAgin();
            }
    });

    