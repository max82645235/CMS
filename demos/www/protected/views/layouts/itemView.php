<?php if($index==0){?>
    <table class="tableStatic table table-bordered table-striped with-check">
        <thead>
            <?php foreach($itemView as $key=>$item){?>
                <?php if($item == 'checkbox'){?>
                    <th width="30px"><span class=""><input type="checkbox" id="checkAll"></span></th>
                <?php }elseif($item=='action'){?>
                    <th>操作</th>
                <?php }else{?>
                    <th>
                        <?php
                            $tmpLabels[$key] = $label= $data->getAttributeLabel($item);
                            echo $label;
                        ?>
                    </th>
                <?php }?>
            <?php }?>
        </thead>
<?php } ?>
    <tr>
        <?php foreach($itemView as $key=>$item){?>
                <?php if($item == 'checkbox'){?>
                      <td><span class=""><input type="checkbox"  id="checkbox_<?=$data['id']?>"></span></td>
                <?php }elseif(isset($extItem[$item])){?>
                      <td><?=$extItem[$item]?></td>
                <?php }else{?>
                      <td><?=$data[$item]?></td>
                <?php }?>
        <?php }?>
    </tr>
<?php if(($index+1)==$itemCount){?>
    </table>
<?php }?>