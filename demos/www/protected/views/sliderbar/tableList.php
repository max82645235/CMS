<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
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
                <th>操作</th>
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
                    <td></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
</div>
