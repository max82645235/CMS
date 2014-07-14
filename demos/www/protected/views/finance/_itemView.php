<?php
    $itemView = array(
        'checkbox','title','content','price','dayTime','action'
    );
    $action = '<a style="margin-left: 20px;" href="/user/userFreeze/userId/'.$data['id'].'" class="btn btn-primary btn-mini">冻结</a>';
    $this->renderPartial('/layouts/itemView',array(
        'index'=>$index,
        'data'=>$data,
        'itemCount'=>$itemCount,
        'itemView'=>$itemView,
        'action'=>$action
    ));
?>