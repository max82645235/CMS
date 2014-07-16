<style>
    .i_class{width: 35px;}
</style>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
        <div style="float: right;padding:5px 30px 0 0"><a style="margin-left: 20px;" href="/finance/typeCurd/actionType/add" class="btn btn-success btn-mini">Add</a></div>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>名称</th>
                <th>顶级</th>
                <th>隶属</th>
                <th style="width:15%">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if($listData){?>
                    <?php $fidInfo = $listData['fidInfo'];?>
                    <?php foreach($listData['tableInfo'] as $val){?>
                        <tr class="grade">
                            <td><?=$val['title']?></td>
                            <td><?=(!$val['fid'])?'<span style="color: red;">是</span>':'否';?></td>
                            <td><?=($res=$val['fid'])?$fidInfo[$res]['title']:'';?></td>
                            <td >
                                <a style="margin-left: 20px;" href="/finance/typeCurd/actionType/del/id/<?=$val['id']?>" class="btn btn-danger btn-mini">Delete</a>
                                <a style="margin-left: 20px;" href="/finance/typeCurd/actionType/edit/id/<?=$val['id']?>" class="btn btn-primary btn-mini">Edit</a>
                            </td>
                        </tr>
                    <?php }?>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
