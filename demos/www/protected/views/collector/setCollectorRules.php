<style>
    #action_btn{text-align: center;}
    .btn_margin {margin: 0 10px;}
    .table td{text-align: center;}
</style>
<div class="span10" style="float: left;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>网站名称: (<?=($model->collector->title)?>)<span style="margin-left: 20px;">网址：<a href="<?=$model->collector->url?>" target="_blank" style="color:mediumvioletred;"><?=$model->collector->url?></a></span></h5>
            <div style="float: right;padding:5px 30px 0 0">
                <a style="margin-left: 20px;" href="/collector/setCollectorRules/actionType/add/collector_id/<?=$model->collector_id?>" class="btn btn-success btn-mini" >新增</a>
            </div>
        </div>
        <?php

        ?>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th><?=$model->getAttributeLabel('id')?></th>
                    <th><?=$model->getAttributeLabel('rule_type')?></th>
                    <th><?=$model->getAttributeLabel('rule_str')?></th>
                    <th><?=$model->getAttributeLabel('rule_status')?></th>
                    <th><?=$model->getAttributeLabel('create_time')?></th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if($currentRulesRecord){?>
                    <?php foreach($currentRulesRecord as $record){?>
                        <tr class="grade" id="tr_<?=$record['id']?>">
                            <td><?=$record['id']?></td>
                            <td><?=CollectorRules::getRuleType($record['rule_type']);?></td>
                            <td><a href="/collector/setCollectorRules/actionType/edit/id/<?=$record['id']?>"><?=htmlspecialchars($record['rule_str']);?></a></td>
                            <td><?=CollectorRules::getRuleStatus($record['rule_status']);?></td>
                            <td><?=$record['create_time'];?></td>
                            <td>
                                <a style="margin-left: 20px;" href="javascript:;" onclick="del_record(<?=$record['id']?>)" class="btn btn-danger btn-mini">删除</a>
                                <a style="margin-left: 20px;" href="/collector/setCollectorRules/actionType/edit/id/<?=$record['id']?>" class="btn btn-primary btn-mini">修改</a>
                            </td>
                        </tr>
                    <?php }?>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="span10" style="float: left;clear: both;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?=Util::$titleInfo[$_GET['actionType']]?></h5>
        </div>
        <div class="widget-content nopadding">
            <?=CHtml::form('','post',array('class'=>'form-horizontal'));?>
            <div class="control-group dropdown">
                <?=CHtml::activeLabel($model,'rule_type',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeDropDownList($model,'rule_type',CollectorRules::$rule_type_arr,array('empty'=>'请选择','style'=>'width:200px;'))?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'rule_str',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextArea($model,'rule_str',array('style'=>'width:500px;height:100px;'))?>
                </div>
            </div>
            <div class="control-group dropdown">
                <?=CHtml::activeLabel($model,'rule_status',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeDropDownList($model,'rule_status',CollectorRules::$rule_status_arr,array('empty'=>'请选择','style'=>'width:200px;'))?>
                </div>
            </div>
            <div class="form-actions" id="action_btn" >
                <?php echo $curdObj->getActionHidden();?>
                <?php echo $curdObj->getRecordIdHidden();?>
                <?php echo CHtml::hiddenField('CollectorRules[collector_id]',$model->collector->id)?>
                <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-success btn_margin')); ?>
                <?php echo CHtml::button('Back',array('class'=>'btn btn-primary btn_margin','type'=>'reset','onclick'=>'location.href="/collector/index";'))?>
            </div>
            <?php echo CHtml::errorSummary($model); ?>
        </div>
    </div>
</div>
<script>
    function del_record(id){
        var record_id = id;
        $.post(
            '/collector/delRecord',
            {'record_id':record_id},
            function(ret){
                if(ret == 'success'){
                    alert('删除成功');
                    $('#tr_'+record_id).hide();
                }else{
                    alert('删除失败');
                }
            },
            'text'
        );
    }
</script>




