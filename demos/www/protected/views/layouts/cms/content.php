<!DOCTYPE html>
<html lang="en">

<!--CSS文件引入-->
<?php $this->beginContent('/layouts/cms/css'); ?>
<?php $this->endContent(); ?>
<style>
.content_body{background: none repeat scroll 0 0 #eeeeee;overflow-x:hidden;margin-top:0px;}

</style>
<body class="content_body">

<div id="content-header">
    <div id="breadcrumb" >
        <a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Widgets</a>
    </div>
    <h1>Widgets</h1>
</div>
<div class="container-fluid">
    <?php echo $content?>
</div>

<!--javscript文件引入-->
<?php $this->beginContent('/layouts/cms/js'); ?>
<?php $this->endContent(); ?>

</body>