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
                <?=CHtml::activeLabel($model,'title',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'title')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'src',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'src')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'picOrder',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::activeTextField($model,'picOrder')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'galleryType',array('class'=>'control-label'));?>
                <div class="controls">
                    <?php
                            $galleryTypeList = CHtml::listData(GalleryType::model()->findAll(),'id','title');
                    ?>
                    <?=CHtml::activeDropDownList($model,'galleryType',$galleryTypeList,array('empty'=>'请选择'))?>
                </div>
            </div>
            <div class="form-actions" id="action_btn" >
                <?php echo CHtml::hiddenField('actionType',$_GET['actionType']);?>
                <?php echo CHtml::activeHiddenField($model,'id')?>
                <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-success btn_margin')); ?>
                <?php echo CHtml::button('Back',array('class'=>'btn btn-primary btn_margin','type'=>'reset','onclick'=>'history.go(-1);'))?>
            </div>
            <?php echo CHtml::errorSummary($model); ?>
        </div>
    </div>
</div>



