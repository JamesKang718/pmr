$(document).ready(function(){
	$('form#etk input[type=number]').on('change',function(){
	  var price = $('#price').val();
	  var quantity = $('#quantity').val();
	  var unitprice = Math.ceil((price/quantity) * 100) / 100;
	  // console.log('unitprice:' + unitprice);
	  $('#unitprice').val(unitprice);
	})
});