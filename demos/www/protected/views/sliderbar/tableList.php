<style>
 .i_class{width: 35px;}
</style>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
        <div style="float: right;padding:5px 30px 0 0"><a style="margin-left: 20px;" href="/sliderbar/FirstMenu/actionType/add" class="btn btn-success btn-mini">Add</a></div>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>标题</th>
                <th>地址</th>
                <th>排序</th>
                <th>顶级</th>
                <th>隶属</th>
                <th style="width:15%">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php $fidInfo = $listData['fidInfo'];?>
            <?php foreach($listData['tableInfo'] as $val){?>
                <tr class="grade">
                    <td><?=$val['title']?></td>
                    <td><?=$val['url']?></td>
                    <td><?=$val['sort']?></td>
                    <td><?=($val['top']==1)?'<span style="color: red;">是</span>':'否';?></td>
                    <td><?=($res=$val['fid'])?$fidInfo[$res]['title']:'';?></td>
                    <td >
                        <a style="margin-left: 20px;" href="/sliderbar/FirstMenu/actionType/del/id/<?=$val['id']?>" class="btn btn-danger btn-mini">Delete</a>
                        <a style="margin-left: 20px;" href="/sliderbar/FirstMenu/actionType/edit/id/<?=$val['id']?>" class="btn btn-primary btn-mini">Edit</a>
                    </td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
</div>
