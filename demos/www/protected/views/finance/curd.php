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
                <?=CHtml::activeLabel($model,'content',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextArea($model,'content')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'price',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'title')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'payTime',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::textField('payTime','',array('class'=>'datepicker ','data-date-format'=>'yyyy-mm-dd','style'=>'width:100px;'))?>
                </div>
            </div>
            <div class="control-group dropdown" >
                <?=CHtml::activeLabel($model,'type',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeDropDownList($model,'type',Finance::$typeList,array('empty'=>'请选择'))?>
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



