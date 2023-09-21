
$(document).ready(function(){
  $('.DelTicket').click(function(){
    if( $('input:checked').length == 0){
      alert('請先選擇票券')
      return false;
    }
    $('#delModal').modal('show');
  });

  $('.batchDelTicket').click(function(){
    if( $('input:checked').length == 0){
      alert('請選擇要刪除的票券')
      return false;
    }
    $_token = $('input[name=_token]').val();
    $.ajaxSetup({
        headers:{ 'X-CSRF-TOKEN' : $_token }
    });
    var delItems = [];
    $('input:checked').each(function(){
      delItems.push($(this).attr('tid'))
    });
    $.ajax({
      cache: false,
      type: 'post',
      data: { delItems: delItems},
      url: routeBTDel,
      dataType: "json",
      success: function(result){
          alert(result.message);
          location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert(jqXHR.responseJSON.message)
      }
    });
  });

  $('.batchUseTicket').click(function(){
    if(!checkUse()) return false;
    $_token = $('input[name=_token]').val();
    $.ajaxSetup({
        headers:{ 'X-CSRF-TOKEN' : $_token }
    });
    var useItems = [];
    $('input:checked').each(function(){
      useItems.push($(this).attr('tid'))
    });
    $.redirect(routeBTUse, {'useItems': useItems, _token:$_token});
  });

  $('.batchTransTicket').click(function(){
    if(!checkUse()) return false;
    $_token = $('input[name=_token]').val();
    $.ajaxSetup({
        headers:{ 'X-CSRF-TOKEN' : $_token }
    });
    var useItems = [];
    $('input:checked').each(function(){
      useItems.push($(this).attr('tid'))
    });
    $.redirect(routeBTrans, {'useItems': useItems, _token:$_token});
  });
});

function checkUse()
{
  if( $('input:checked').length == 0)
    return false;
  var allowSubmit = true;
  var cid = $('input:checked').first().attr('cid');
  $('input:checked').each(function(){
    console.log($(this).attr('cid'))
    if(cid != $(this).attr('cid')){
      alert('批次 兌換/ 移轉 只能選擇相同主辦單位')
      allowSubmit = false;
      return false;
    }
    return true;
  });
  return allowSubmit;
}