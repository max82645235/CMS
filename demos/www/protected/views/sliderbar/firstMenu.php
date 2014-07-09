<style>
#action_btn{text-align: center;}
.btn_margin {margin: 0 10px;}
</style>
<div class="span6">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
            <?=CHtml::form('','post',array('class'=>'form-horizontal'));?>
                <div class="control-group">
                    <?=CHtml::activeLabel($model,'title',array('class'=>'control-label'));?>
                    <div class="controls">
                        <?=CHtml::activeTextField($model,'title')?>
                    </div>
                </div>
                <div class="control-group">
                    <?=CHtml::activeLabel($model,'top',array('class'=>'control-label'));?>
                    <div class="controls">
                        <label>
                            <?=CHtml::activeRadioButton($model,'top',array('value'=>0,'checked'=>'checked','id'=>'radio1'))?>
                            否</label>
                        <label>
                            <?=CHtml::activeRadioButton($model,'top',array('value'=>1,'id'=>'radio2'))?>
                            是</label>
                    </div>
                </div>
                <div class="control-group">
                    <?=CHtml::activeLabel($model,'icon',array('class'=>'control-label'));?>
                    <div class="controls">
                        <?=CHtml::activeTextField($model,'icon')?>
                    </div>
                </div>
                <div class="control-group">
                    <?=CHtml::activeLabel($model,'sort',array('class'=>'control-label'));?>
                    <div class="controls">
                        <?=CHtml::activeTextField($model,'sort')?>
                    </div>
                </div>
                <div class="control-group">
                    <?=CHtml::activeLabel($model,'url',array('class'=>'control-label'));?>
                    <div class="controls">
                        <?=CHtml::activeTextField($model,'url')?>
                    </div>
                </div>
                <div class="control-group dropdown">
                    <?=CHtml::activeLabel($model,'fid',array('class'=>'control-label'));?>
                    <div class="controls">
                        <?=CHtml::activeDropDownList($model,'fid',$topList,array('empty'=>'请选择'))?>
                    </div>
                </div>
                <div class="form-actions" id="action_btn" >
                    <?php echo $curdObj->getActionHidden();?>
                    <?php echo $curdObj->getRecordIdHidden();?>
                    <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-success btn_margin')); ?>
                    <?php echo CHtml::button('Back',array('class'=>'btn btn-primary btn_margin','type'=>'reset','onclick'=>'history.go(-1);'))?>
                </div>
            <?php echo CHtml::errorSummary($model); ?>
        </div>
    </div>
</div>
<script>
    $("#radio1,#radio2").click(function(){
        var id = $(this).attr('id');
        if(id == 'radio1'){
            $('.dropdown').show();
        }else if(id == 'radio2'){
            $('.dropdown').hide();
        }
    });
</script>



