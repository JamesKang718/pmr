  // 控制活動內文字數
    $(document).ready(function(){
        var max_text = 58;
        var max_title_text = 10;
        var max_tickBagTitle = 10;
        var max_tickBagTitle2 = 18;
        var max_tickBagitem = 10;
        var w = $(window).width(); //判斷目前裝置尺寸寬度

        $("p.act-brief-show").each(function(){
              if($(this).text().length > max_text)
              {
                var text=$(this).text().substring(0,max_text) + "...";
                $(this).text(text);
              }

        });
        // 控制活動title字數
        $("a.act_title").each(function(){
              if($(this).text().length > max_title_text)
              {
                var text=$(this).text().substring(0,max_title_text) + "...";
                $(this).text(text);
              }

        });
          // 控制獎券包title字數
        $("small.tickBagTitle").each(function(){

          if($(this).text().length > 12 && w < 480) {    
               var text=$(this).text().substring(0,12) + "...";
                $(this).text(text);
             }
             else if($(this).text().length > max_tickBagTitle2 && w >= 480) {
               var text=$(this).text().substring(0,max_tickBagTitle2) + "...";
                $(this).text(text);
             }
        });



          // 控制獎券包內文字數
         $("small.tickBagitem").each(function(){

          if($(this).text().length > 12 && w < 480) {   
               var text=$(this).text().substring(0,12) + "...";
                $(this).text(text);
             }
             else if($(this).text().length > 18 && w >= 480) {

               var text=$(this).text().substring(0,18) + "...";
                $(this).text(text);
             }
        });
         });