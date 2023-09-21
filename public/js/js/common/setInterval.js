
// 1、獲取元素
let hour = document.querySelector('#hour');
let minute = document.querySelector('#minute');
let second = document.querySelector('#second');
let inputTime = +new Date('time'); //返回用戶輸入的時間總毫秒數

// 2、先調用一次此函數,可以防止 刷新頁面時 顯示空白的 bug
countDown();

// 3、開啟定時器
setInterval(countDown, 1000);

function countDown() {
    let nowTime = +new Date(); //返回當前的時間總毫秒數
    let times = (inputTime - nowTime) / 1000;
    let h = parseInt(times / 60 / 60 % 24);
    h = h < 10 ? '0' + h : h;
    hour.innerHTML = h; //把剩餘的小時給 小時的黑色盒子
    let m = parseInt(times / 60 / 60 % 60);
    m = m < 10 ? '0' + m : m;    
    minute.innerHTML = m; //把剩餘的分鐘給 分鐘的黑色盒子
    let s = parseInt(times % 60);
    s = s < 10 ? '0' + s : s;
    second.innerHTML = s; //把剩餘的秒數給 秒數的黑色盒子
}
