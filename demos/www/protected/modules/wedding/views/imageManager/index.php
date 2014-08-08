<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <div style="float: right;padding:5px 30px 0 0"><a style="margin-left: 20px;" href="/wedding/imageManager/imageCurd/actionType/add" class="btn btn-success btn-mini">Add</a></div>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>外链地址</th>
                <th>图片类型</th>
                <th>排序</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($recordList as $record){?>
                <tr class="grade">
                    <td style="text-align: center;"><?=$record->id?></td>
                    <td style="text-align: center;"><?=$record->title?></td>
                    <td style="text-align: center;"><a href="<?=$record->src?>" target="_blank"><?=$record->src?></a></td>
                    <td style="text-align: center;"><?=$record->GalleryType->title?></td>
                    <td style="text-align: center;"><?=$record->orderNum?></td>
                    <td style="text-align: center;"><?=$record->update_time?></td>
                    <td >
                        <a style="margin-left: 20px;" href="/wedding/imageManager/galleryCurd/actionType/del/id/<?=$record['id']?>" class="btn btn-danger btn-mini">Delete</a>
                        <a style="margin-left: 20px;" href="/wedding/imageManager/galleryCurd/actionType/edit/id/<?=$record['id']?>" class="btn btn-primary btn-mini">Edit</a>
                        <a style="margin-left: 20px;" href="<?=$record->src?>" target="_blank" class="btn btn-primary btn-mini">查看图片</a>
                    </td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
</div>
