<style>
    #action_btn{text-align: center;}
    .btn_margin {margin: 0 10px;}
    .table td{text-align: center;}
</style>
<div class="span8" style="float: left;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>当日收支流水帐单</h5>
        </div>
        <?php

        ?>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>名称</th>
                    <th>金额</th>
                    <th>类型</th>
                    <th>添加时间</th>
                </tr>
                </thead>
                <tbody>
                <?php if($currentDayRecord){?>
                        <?php foreach($currentDayRecord as $record){?>
                            <tr class="grade">
                                <td><?=$record['title']?></td>
                                <td><?=$record['price'];?></td>
                                <td><?=(isset($record->financeType->title))?$record->financeType->title:'';?></td>
                                <td><?=$record['createTime'];?></td>
                            </tr>
                        <?php }?>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$financeTypeData = FinanceType::model()->findAll();
$financeTypeList = FinanceType::getLabelDropDownList($financeTypeData,array('name'=>'Finance[type]','style'=>'width:200px;',''),$model->type);
?>
<div class="span6" style="float: right;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?=Util::$titleInfo[$_GET['actionType']]?></h5>
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
                    <?=CHtml::activeTextField($model,'price')?>
                </div>
            </div>
            <div class="control-group">
                <?=CHtml::activeLabel($model,'dayTime',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=CHtml::textField('Finance[dayTime]',date("Y-m-d"),array('class'=>'datepicker ','data-date-format'=>'yyyy-mm-dd','style'=>'width:100px;','name'=>'Finance[dayTime]'))?>
                </div>
            </div>
            <div class="control-group dropdown" >
                <?=CHtml::activeLabel($model,'type',array('class'=>'control-label'));?>
                <div class="controls">
                    <?=$financeTypeList?>
                </div>
            </div>
            <div class="form-actions" id="action_btn" >
                <?php echo $curdObj->getActionHidden();?>
                <?php echo $curdObj->getRecordIdHidden();?>
                <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-success btn_margin')); ?>
                <?php echo CHtml::button('Back',array('class'=>'btn btn-primary btn_margin','type'=>'reset','onclick'=>'location.href="/finance/index";'))?>
            </div>
            <?php echo CHtml::errorSummary($model); ?>
        </div>
    </div>
</div>



