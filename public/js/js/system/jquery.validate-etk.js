if ($.validator) {
    $.validator.addMethod('checkTwID', function(IDNum, element) {
        //建立字母分數陣列(A~Z)
        var city = new Array(
             1,10,19,28,37,46,55,64,39,73,82, 2,11,
            20,48,29,38,47,56,65,74,83,21, 3,12,30
        )
        IDNum = IDNum.toUpperCase();
        // 使用「正規表達式」檢驗格式
        if (IDNum.search(/^[A-Z](1|2)\d{8}$/i) == -1) {
            //alert('基本格式錯誤');
            return false;
        } else {
            //將字串分割為陣列(IE必需這麼做才不會出錯)
            IDNum = IDNum.split('');
            //計算總分
            var total = city[IDNum[0].charCodeAt(0)-65];
            for(var i=1; i<=8; i++){
                total += eval(IDNum[i]) * (9 - i);
            }
            //補上檢查碼(最後一碼)
            total += eval(IDNum[9]);
            //檢查比對碼(餘數應為0);
            return ((total%10 == 0 ));
        }
    }, '身份證格式錯誤');

    $.validator.addMethod('exactlength', function(value, element, param) {
      return this.optional(element) || value.length == param;
    }, $.validator.format("Please enter exactly {0} characters."));
}

function checkTwID(IDNum){
    //建立字母分數陣列(A~Z)
    var city = new Array(
         1,10,19,28,37,46,55,64,39,73,82, 2,11,
        20,48,29,38,47,56,65,74,83,21, 3,12,30
    )
    IDNum = IDNum.toUpperCase();
    // 使用「正規表達式」檢驗格式
    if (IDNum.search(/^[A-Z](1|2)\d{8}$/i) == -1) {
        //alert('基本格式錯誤');
        console.log('I D Num error')
        return false;
    } else {
        //將字串分割為陣列(IE必需這麼做才不會出錯)
        IDNum = IDNum.split('');
        //計算總分
        var total = city[IDNum[0].charCodeAt(0)-65];
        for(var i=1; i<=8; i++){
            total += eval(IDNum[i]) * (9 - i);
        }
        //補上檢查碼(最後一碼)
        total += eval(IDNum[9]);
        //檢查比對碼(餘數應為0);
        return ((total%10 == 0 ));
    }
}