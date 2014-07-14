<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
        <div style="float: right;padding:5px 30px 0 0"><a style="margin-left: 20px;" href="/user/userCurd/actionType/add" class="btn btn-success btn-mini">Add</a></div>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>账号</th>
                <th>真实姓名</th>
                <th>注册时间</th>
                <th>状态</th>
                <th style="width:15%">操作</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($recordList as $val){?>
                <tr class="grade">
                    <td><?=$val['id']?></td>
                    <td><?=$val['userName']?></td>
                    <td><?=$val['realName']?></td>
                    <td><?=$val['createTime']?></td>
                    <td><?=($val['status']==0)?'<span style="color: blue;">冻结</span>':'正常';?></td>
                    <td>
                        <?php if($val['status']==1){?>
                            <a style="margin-left: 20px;" href="/user/userFreeze/userId/<?=$val['id']?>" class="btn btn-primary btn-mini">冻结</a>
                        <?php }else{?>
                            <a style="margin-left: 20px;" href="/user/userFreeze/userId/<?=$val['id']?>" class="btn btn-danger btn-mini">解冻</a>
                        <?php }?>
                    </td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
</div>
