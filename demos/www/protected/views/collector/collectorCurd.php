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
                <?=CHtml::activeLabelEx($model,'title',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'title')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabelEx($model,'url',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextArea($model,'url',array('style'=>'width:300px'))?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'end_str',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextArea($model,'end_str')?>
                </div>
            </div>
            <div class="control-group">
                <?php
                    if(!$model->user_agent){
                        $model->user_agent = Collector::DEFAULT_USER_AGENT;
                    }
                ?>
                <?=CHtml::activeLabel($model,'user_agent',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextArea($model,'user_agent',array('style'=>'width:300px;'))?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'web_fname',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextArea($model,'web_fname')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'web_icon',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextArea($model,'web_icon')?>
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



