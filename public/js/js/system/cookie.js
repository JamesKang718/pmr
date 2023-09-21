// path : js/system/cookie.js

function setCookie(name, value, exdays) {
    if(exdays == null)
        exdays = 1;
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = name + '=' + value + ";" + expires + "; path=/";
}

function deleteCookie(name) {   
    //document.cookie = name + '=; Max-Age=-99999999;';  
    setCookie(name, '');
}

function getCookie(name) {
    var name = name + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(name) {
    var name = getCookie(name);
    if (name != "")
        return true;
    return false;
}

function formDataSaveToCookie($formData, $startIndex, $endIndex)
{
    for($x=$startIndex; $x<$endIndex; ++$x) {
        setCookie($formData[$x]['name'], $formData[$x]['value'], 1);
    }
}

function formDataDeleteFromCookie($formData, $startIndex, $endIndex)
{
    for($x=$startIndex; $x<$endIndex; ++$x) {
        deleteCookie($formData[$x]['name'])
    }
}

function removeCookies() {
    var cookies = document.cookie.split(";");
    //alert(cookies);
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        deleteCookie(name);
    }
}