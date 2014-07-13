<?php
    $this->widget('zii.widgets.CListView',array(
        'dataProvider'=>$dp,
        'itemView'=>$itemView,
        'emptyText'=>'暂时没有数据',
        'ajaxUpdate'=>false,
        'id'=>'table_listView'
    ));
?>
<script>
    $('.pager .yiiPager a').live('click',function(){
        $.ajax({
            url:$(this).attr('href'),
            success:function(html){
                alert(html);
                $('.list-view').html(html);
            }
        });
        return false;
    });
</script>