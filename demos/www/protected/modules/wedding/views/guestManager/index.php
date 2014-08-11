<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
        <div style="float: right;padding:5px 30px 0 0"><a style="margin-left: 20px;" href="/wedding/guestManager/guestCurd/actionType/add" class="btn btn-success btn-mini">Add</a></div>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>QQ号码</th>
                <th>联系电话</th>
                <th>参加状态</th>
                <th>请帖发送状态</th>
                <th>创建时间</th>
                <th>回复时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($recordList as $record){?>
                <tr class="grade">
                    <td style="text-align: center;"><?=$record->id?></td>
                    <td style="text-align: center;"><?=$record->name?></td>
                    <td style="text-align: center;"><?=$record->qq?></td>
                    <td style="text-align: center;"><?=$record->tel?></td>
                    <td style="text-align: center;"><?=WeddingGuest::getWeddingStatus($record->wedding_status)?></td>
                    <td style="text-align: center;" id="send_status_<?=$record->id?>"><?=WeddingGuest::getSendStatus($record->send_status)?></td>
                    <td style="text-align: center;"><?=$record->create_time?></td>
                    <td style="text-align: center;"><?=$record->update_time?></td>
                    <td >
                        <a style="margin-left: 20px;" href="/wedding/guestManager/guestCurd/actionType/edit/id/<?=$record['id']?>" class="btn btn-primary btn-mini">Edit</a>
                        <a style="margin-left: 20px;" href="javascript:;" onclick="send_email(<?=$record->id?>)"  target="_blank" class="btn btn-primary btn-mini">发送邮件</a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
<script>
function send_email(record_id){
    $.post(
            'sendEmail',
            {'record_id':record_id},
            function(ret){
                if(ret.status == 'success'){
                    alert('发送成功');
                    var html = '<span style="color: green;">已发送</span>';
                    $('#send_status_'+record_id).html(html);
                }else if(ret.status == 'hasSend'){
                    alert('此人已发送了喔！');
                }else{
                    alert('发送失败');
                }
            }
    );
}
</script>