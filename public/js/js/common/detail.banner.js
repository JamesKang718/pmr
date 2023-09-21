
// 等頁面加載後才執行 
window.addEventListener('load', function() {
    var pics = document.querySelectorAll('.banner_pics ul li');
    var prev = document.querySelector('.prev');
    var next = document.querySelector('.next');
    var mark = document.querySelector('.detail_banner_mark');
    var ol = mark.querySelector('ol');
    // console.log(pics);
    // 動態生成滾動條
    for (var i = 0; i < pics.length; i++) {
        var li = document.createElement('li');
        ol.appendChild(li);
    }
    
    // 輪流顯示 banner 圖片
    var num = 0;
    pics[num].style.display = 'block';
    ol.children[num].className = 'current';
   var timer = setInterval (function() {
        // console.log(num);
        pics[num].style.display = 'none';
        ol.children[num].className = '';
        if (num < pics.length - 1) {
            num++;
        } else {
            num = 0;
        }
        pics[num].style.display = 'block';
        ol.children[num].className = 'current trans';
   }, 10000);
   prev.addEventListener('click', function() {
       if(num == 0) {
            pics[num].style.display = 'none';
            ol.children[num].className = '';
            num = pics.length-1;
            pics[num].style.display = 'block';
            ol.children[num].className = 'current trans';
       } else {
            pics[num].style.display = 'none';
            ol.children[num].className = '';
            num--;
            pics[num].style.display = 'block';
            ol.children[num].className = 'current trans';
       }
   });
   next.addEventListener('click', function() {
       if(num < pics.length-1) {
            pics[num].style.display = 'none';
            ol.children[num].className = '';
            num++;
            pics[num].style.display = 'block';
            ol.children[num].className = 'current trans';
       } else {
            pics[num].style.display = 'none';
            ol.children[num].className = '';
            num = 0;
            pics[num].style.display = 'block';
            ol.children[num].className = 'current trans';
       }
   });
});
