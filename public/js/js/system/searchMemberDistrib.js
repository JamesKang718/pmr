// path : /js/system/searchMember.js
$(function(){
	var lists;
	$("input[name=search]").autocomplete({
	    source: function (request, callback){
		    $search = $("input[name=search]").val();
		    if($search.length >= 3) {
		    	$_token = $('input[name=_token]').val();
			    $.ajaxSetup({
			        headers:{ 'X-CSRF-TOKEN' : $_token }
			    });

				$.ajax({
					url: "/admin/members/searchMember",
					type: "post",
					data: {'search':$search},
					async: false,
					dataType:'json',
					success: function (xhr, result)
					{
						lists = xhr;
					    callback(lists);
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						$('div#errorMessageSearch').show(0).children('ul').html('');
						lists = JSON.parse(jqXHR.responseText);
						//console.log(lists.errors.search);
						$str = '';
						$.each(lists.errors.search, function(index, row){
							$str = $str + ('<li>' + row + '</li>');
						});
			            $('div#errorMessageSearch').children('ul').append($str);
			            $('div#errorMessageSearch').delay(3500).hide(0);
	            	}
				});
			}
	    },
	    select: function(event, ui) {
	    	$chosen = ui.item.label;
	    	$m_no = $chosen.substring(0, 16);
	    	console.log($m_no)
	    	if($chosen == '未有該手機之會員')
	    		return false;

	    	$checkHas = false;
	    	$.each($('input[name="workers[]"]'), function(index, row){
	    		console.log($(row).val())
	    		if($m_no == $(row).val()) {
	    			$checkHas = true;
	    			return false;
	    		}
	    	});

	    	if($checkHas) {
	    		alert('該會員已被加入票券批發中...');
	    		this.value = "";
	    		return false;
	    	}

	    	$_token = $('input[name=_token]').val();
		    $.ajaxSetup({
		        headers:{ 'X-CSRF-TOKEN' : $_token }
		    });

	    	$.ajax({
				url: "/admin/members/getMemberByMNo",
				type: "post",
				data: {'m_no':$m_no},
				async: false,
				dataType:'json',
				success: function (xhr, result)
				{
					$box = $('div#putChosenMember').children('div.row:first');

					$hidden = '<input type="hidden" name="workers[]" value="' + xhr.m_no + '" />';
					$color = 'border-secondary text-dark';
					if(xhr.suspend == 1) {
						$color = 'border-danger text-danger';
						$hidden = '';
					}
					$child = '<div class="everyWorker col-4 border ' + $color +
					'"><div class="row"><div class="col-5"><img src="/img/avatar/' + xhr.avatar +
					'" class="img-thumbnail mt-3"></div><div class="col-7"><br>會員編號 : <br>' + xhr.m_no +
					'<br>' + xhr.nickname + '<br>' + xhr.phone + '<br>' + $hidden +
					'數量：<input type="number" name="quantity[]" style="width:90px" required>' +
					'<button class="btn btn-danger float-right deleteMember mb-3" style="margin-top:5px;" type="button">取消</button></div></div></div>';
	                $box.append($child);

	                $len = $('div.everyWorker').length;
			        if($len > 0)
			        	$('button#createBtn').show(0);
				},
				error: function(jqXHR, textStatus, errorThrown)
				{

            	}
			});

			$('button.deleteMember').click(function(){
		        $index = $('button.deleteMember').index(this);
		        $('div.everyWorker').eq($index).remove();

		        $len = $('div.everyWorker').length;
		        if($len <= 0)
		        	$('button#createBtn').hide(0);
		    });

            this.value = "";
  			return false;
	    }
	});
});