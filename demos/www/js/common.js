$(function(){
    $('.pager .yiiPager a').live('click',function(){
        $.ajax({
            url:$(this).attr('href'),
            success:function(html){
                $('#table_listView').html(html);
            }
    });
    return false;
    });
})