
// 等頁面加載後才執行
window.addEventListener('load', function() {
    var web = document.querySelectorAll('.i58d_banner_web > ul > li');
    var mobile = document.querySelectorAll('.i58d_banner_mobile > ul > li');
    var prev = document.querySelector('.prev');
    var next = document.querySelector('.next');
    var mark = document.querySelector('.i58d_banner_mark');
    var ol = mark.querySelector('ol');
    // 動態生成滾動條
    for (var i = 0; i < web.length; i++) {
        var li = document.createElement('li');
        ol.appendChild(li);
    }
    // 輪流顯示 banner 圖片
    var num = 0;
    web[num].style.display = 'block';
    mobile[num].style.display = 'block';
    ol.children[num].className = 'current';
    var timer = setInterval (function() {
        web[num].style.display = 'none';
        mobile[num].style.display = 'none';
        ol.children[num].className = '';
        if (num < web.length - 1) {
            num++;
        } else {
            num = 0;
        }
        web[num].style.display = 'block';
        mobile[num].style.display = 'block';
        ol.children[num].className = 'current trans';
    }, 10000);

    prev.addEventListener('click', function() {
       if(num == 0) {
            web[num].style.display = 'none';
            mobile[num].style.display = 'none';
            ol.children[num].className = '';
            num = web.length-1;
            web[num].style.display = 'block';
            mobile[num].style.display = 'block';
            ol.children[num].className = 'current trans';
       } else {
            web[num].style.display = 'none';
            mobile[num].style.display = 'none';
            ol.children[num].className = '';
            num--;
            web[num].style.display = 'block';
            mobile[num].style.display = 'block';
            ol.children[num].className = 'current trans';
       }
    });

    next.addEventListener('click', function() {
       if(num < web.length-1) {
            web[num].style.display = 'none';
            mobile[num].style.display = 'none';
            ol.children[num].className = '';
            num++;
            web[num].style.display = 'block';
            mobile[num].style.display = 'block';
            ol.children[num].className = 'current trans';
       } else {
            web[num].style.display = 'none';
            mobile[num].style.display = 'none';
            ol.children[num].className = '';
            num = 0;
            web[num].style.display = 'block';
            mobile[num].style.display = 'block';
            ol.children[num].className = 'current trans';
       }
    });
});
