
<div id="sidebar">
    <ul>
        <?php foreach($listData as $data){ ?>
            <?php
                  $url = ($data[0]['url'])?$data[0]['url']:'#';
                  $title = $data[0]['title'];
                  $count = count($data);
                  $icon = $data[0]['icon'];
            ?>
            <li class="submenu"> <a href="<?=$url?>"><i class="icon icon-<?=$icon?>"></i> <span><?=$title?></span> <?php if($count>1){?><span class="label label-important"><?=$count-1?></span><?php }?></a>
                <?php if($count>1){ array_shift($data);?>
                <ul>
                    <?php foreach($data as $v){?>
                        <li><a href="<?=$v['url']?>"><?=$v['title']?></a></li>
                    <?php }?>
                </ul>
                <?php }?>
            </li>
        <?php }?>
    </ul>
</div>
<!--sidebar-menu-->
<script>
    $("#sidebar li a").click(function(e){
        var frameHref = $(this).attr('href');
        if(frameHref != '#'){
            frameJump(frameHref,e);
        }
    });

    function frameJump(frameHref,e){
        frame.location= frameHref;
        e.preventDefault();
    }
</script>