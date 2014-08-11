<style>
    #action_btn{text-align: center;}
</style>
<div class="span6">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
            <?=CHtml::form('','post',array('class'=>'form-horizontal'));?>
            <div class="control-group">
                <?=CHtml::activeLabelEx($model,'name',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'name')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabelEx($model,'qq',array('class'=>'control-label'))?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'qq')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'wedding_status',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeDropDownList($model,'wedding_status',WeddingGuest::$weddingStatusArr,array('empty'=>'请选择'))?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'send_status',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeDropDownList($model,'send_status',WeddingGuest::$sendStatusArr)?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'tel',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'tel')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'salt_key',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=$model->salt_key?>
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



