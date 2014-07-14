<?php if($index==0){?>
    <table class="tableStatic table table-bordered table-striped with-check">
        <thead>
            <?php foreach($itemView as $item){?>
                <?php if($item == 'checkbox'){?>
                    <th width="30px"><span class=""><input type="checkbox" id="checkAll"></span></th>
                <?php }else{?>
                    <th><?=$data->getAttributeLabel($item);?></th>
                <?php }?>
            <?php }?>
        </thead>
<?php } ?>
    <tr>
        <?php foreach($itemView as $item){?>
                <?php if($item == 'checkbox'){?>
                      <td><span class=""><input type="checkbox"  id="checkbox_<?=$data['id']?>"></span></td>
                <?php }elseif($item == 'action'){?>
                      <td><?=$action?></td>
                <?php }else{?>
                      <td><?=$data[$item]?></td>
                <?php }?>
        <?php }?>
    </tr>
<?php if(($index+1)==$itemCount){?>
    </table>
<?php }?>