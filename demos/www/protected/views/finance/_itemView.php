<?php
    $itemView = array(
        'checkbox','title','content','price','dayTime','type','action'
    );
    $extItem['action'] = '<a style="margin-left: 20px;" href="/finance/curd/actionType/edit/id/'.$data['id'].'" class="btn btn-primary btn-mini">修改</a>';
    $extItem['type'] = (isset($data->financeType->title))?$data->financeType->title:'';
    $this->renderPartial('/layouts/itemView',array(
        'index'=>$index,
        'data'=>$data,
        'itemCount'=>$itemCount,
        'itemView'=>$itemView,
        'extItem'=>$extItem
    ));
?>