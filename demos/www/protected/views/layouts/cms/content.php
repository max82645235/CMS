<!DOCTYPE html>
<html lang="en">

<!--CSS文件引入-->
<?php $this->beginContent('//layouts/cms/css'); ?>
<?php $this->endContent(); ?>
<?php $currentUrlName = $this->getCurrentSliderInfo();?>
<style>
.content_body{background: none repeat scroll 0 0 #eeeeee;overflow-x:hidden;margin-top:0px;}

</style>
<body class="content_body">

<div id="content-header">
    <div id="breadcrumb" >
        <a href="/site/home" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> 主页</a>
        <a href="<?=Yii::app()->request->getUrl()?>" class="current"><?=$currentUrlName;?></a>
    </div>
    <h1><?=$currentUrlName?></h1>
</div>
<div class="container-fluid">
    <?php echo $content?>
</div>

<!--javscript文件引入-->
<?php $this->beginContent('//layouts/cms/js'); ?>
<?php $this->endContent(); ?>

</body>