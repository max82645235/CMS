<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <div>
            <?=CHtml::form('','post',array('class'=>'form-horizontal'));?>
            <span style="margin: 0 15px"><?=$model->getAttributeLabel('title').'   '.CHtml::telField('title','',array('class'=>'span2'))?></span>
            <span style="margin: 0 15px"><?=$model->getAttributeLabel('dayTime').'   '.Util::datePicker();?></span>
            <span style="margin: 0 15px"><?=$model->getAttributeLabel('type').'   '.CHtml::dropDownList('type','',Finance::$typeList,array('empty'=>'请选择','style'=>'width:156px;'));?></span>
            <span style="margin: 0 15px"><?='支出'.'   '.CHtml::radioButton('payIncome',false,array('style'=>'width:156px;','value'=>'1'))?></span>
            <span style="margin: 0 15px"><?='收入'.'   '.CHtml::radioButton('payIncome',false,array('style'=>'width:156px;','value'=>'2'))?></span>
            <span  style="margin: 0 15px"> <?php echo CHtml::submitButton('搜索',array('class'=>'btn btn-danger  btn_margin')); ?></span>
            <span style="float: right;margin-right: 20px;"><a style="margin-left: 20px;" href="/finance/actionCurd/actionType/add" class="btn btn-success btn-mini">Add</a></span>
        </div>
       <!-- <div style="float: right;padding:5px 30px 0 0"><a style="margin-left: 20px;" href="/finance/actionCurd/actionType/add" class="btn btn-success btn-mini">Add</a></div>-->
    </div>
    <div class="widget-content nopadding">
        <?php
             $this->renderPartial('/layouts/listView',array(
                 'dp'=>$model->search(),
                 'itemView'=>'_itemView'
             ));
        ?>
    </div>
</div>


