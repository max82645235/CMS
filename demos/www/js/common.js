$(function(){
    $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
    $('select').select2();
    $('.colorpicker').colorpicker();
    $('.datepicker').datepicker();

    $('.pager a').live('click',function(){
        var url = $(this).attr('href');
        var fromData = $('.ajaxForm').serialize();
        url = url+"&"+fromData;
        $.ajax({
            url:url,
            success:function(html){
                $('#table_listView').html(html);
            }
        });
        return false;
    });

    $('.ajaxForm').submit(function(e){
        var url = $(this).attr('action');
        var formDate = $(this).serialize();
        $.ajax({
            url:url,
            data:formDate,
            success:function(html){
                $('#table_listView').html(html);
            },
            'type':'post'
        });
        e.preventDefault();
    });
})