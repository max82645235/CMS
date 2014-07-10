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
                <?=CHtml::activeLabel($model,'userName',array('class'=>'control-label'));?>
                <div class="controls">
                    <?php $disable = ($model->getScenario()=='add')?false:true;?>
                    <?=CHtml::activeTextField($model,'userName',array('disabled'=>$disable))?>
                </div>
            </div>
            <?php if(!$disable){?>
                <div class="control-group">
                    <?=CHtml::activeLabel($model,'password',array('class'=>'control-label'));?>
                    <div class="controls">
                        <?=CHtml::activePasswordField($model,'password')?>
                    </div>
                </div>
            <?php }else{?>
                <div class="control-group">
                    <?=CHtml::activeLabel($model,'passwordFix',array('class'=>'control-label'));?>
                    <div class="controls">
                    <?=CHtml::checkBox('passwordFix',true);?>
                    </div>
                </div>
                <div class="control-group" style="display: none;" id="div_password">
                    <?=CHtml::activeLabel($model,'password',array('class'=>'control-label'));?>
                    <div class="controls">
                        <?=CHtml::activePasswordField($model,'password',array('value'=>''))?>
                    </div>
                </div>
            <?php }?>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'realName',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'realName')?>
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
    $("#passwordFix").click(function(){
        var div_password = $('#div_password');
        if($(this).is(':checked')){
            div_password.hide();
        }else{
            div_password.show();
        }
    });
</script>



