// path : /js/system/main.js
$(document).ready(function(){
	$count = 0;

	if($('div#indexMessageBox').length) {
		// $('div#indexMessageBox').delay(3000).hide(0);
		$innertHtml = $('div#indexMessageBox').html();
		$containCreate = $innertHtml.indexOf('新增') >= 0;
		if($containCreate == true) {
			$('tbody').children('tr:first').css("background-color", '#f8e564');
		}
	}
	// if($('div#errorMessage').length) {
	// 	$('div#errorMessage').delay(3500).hide(0);
	// }

	// $('button').on('click',function(){
	// 	$(this).hide(0).delay(500).show(0);
	// });
  $('[data-toggle="tooltip"]').tooltip()
});

/* --------------- Blink --------------- */
/*$firstRowBlink = setInterval(function() {
	$count++;
	if($count >= 9) {
		clearInterval($firstRowBlink);
	} else {
	    $('tbody').children('tr:first').css("background-color", function () {
	        this.switch = !this.switch;
	        return this.switch ? "#f8e564" : "";
	    });
    }
}, 600);*/