<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
        <div style="float: right;padding:5px 30px 0 0"><a style="margin-left: 20px;" href="/sliderbar/FirstMenu/actionType/add" class="btn btn-success btn-mini">Add</a></div>
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

