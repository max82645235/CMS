<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
        <div style="float: right;padding:5px 30px 0 0"><a style="margin-left: 20px;" href="javascript:;" class="btn btn-success btn-mini" onclick="multi_collect()">手动异步采集</a><a style="margin-left: 20px;" href="/collector/curd/actionType/add" class="btn btn-success btn-mini" >新增</a></div>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th><?=$model->getAttributeLabel('title')?></th>
                <th><?=$model->getAttributeLabel('url')?></th>
                <th><?=$model->getAttributeLabel('status')?></th>
                <th><?=$model->getAttributeLabel('keywords')?></th>
                <th><?=$model->getAttributeLabel('create_time')?></th>
                <th><?=$model->getAttributeLabel('update_time')?></th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if($recordList){foreach($recordList as $record){?>
                <tr class="grade">
                    <td style="text-align: center;"><?=$record->id?></td>
                    <td style="text-align: center;"><?=$record->title?></td>
                    <td style="text-align: center;"><?=$record->url?></td>
                    <td style="text-align: center;" id="status_<?=$record->id?>"><?=Collector::getStatus($record->status)?></td>
                    <td style="text-align: center;"><?=$record->keywords?></td>
                    <td style="text-align: center;"><?=$record->create_time?></td>
                    <td style="text-align: center;"><?=$record->update_time?></td>
                    <td >
                        <a style="margin-left: 20px;" href="/collector/curd/actionType/del/id/<?=$record->id?>" class="btn btn-danger btn-mini">删除</a>
                        <a style="margin-left: 20px;" href="/collector/curd/actionType/edit/id/<?=$record->id?>" class="btn btn-primary btn-mini">修改</a>
                        <a style="margin-left: 20px;" href="javascript:;" onclick="manual_collect(<?=$record->id?>)"   class="btn btn-primary btn-mini">手动采集</a>

                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function manual_collect(record_id){
        $.post(
            'singleCollect',
            {record_id:record_id},
            function(ret){
                if(ret.status == 'success'){
                    alert('采集成功');
                    $('#status_'+record_id).html(ret.html);
                }else{
                    alert('采集失败');
                }
            },
            'json'
        );
    }

    function multi_collect(){
        $.post(
            'multiCollect',
            {},
            function(ret){
                if(ret==1){
                    alert('异步采集请求成功');
                    location.href = '/collector/index';
                }else{
                    alert('采集失败');
                }
            },
            'json'
        );
    }
</script>