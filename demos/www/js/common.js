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

    $('.ajaxForm').submit(function(e){
        var url = $('.keys').attr('title');
        var formDate = $(this).serialize();
        url=url+'/'+formDate;
        $.ajax({
            url:url,
            success:function(html){
                $('#table_listView').html(html);
            }
        });
        e.preventDefault();
    });
})