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
                <?=CHtml::activeLabel($model,'payIncome',array('class'=>'control-label'));?>
                <div class="controls">
                    <?php
                    $zcArr = array('value'=>0,'id'=>'radio1');
                    $srArr = array('value'=>1,'id'=>'radio2');
                    if($model->payIncome==1){
                        $srArr['checked']='checked';
                    }else{
                        $zcArr['checked']='checked';
                    }
                    ?>
                    <label>
                        <?=CHtml::activeRadioButton($model,'payIncome',$zcArr)?>
                        支出</label>
                    <label>
                        <?=CHtml::activeRadioButton($model,'payIncome',$srArr)?>
                        收入</label>
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



