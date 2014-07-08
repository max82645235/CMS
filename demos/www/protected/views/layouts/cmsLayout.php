<?php $this->beginContent('/layouts/cms/header'); ?>
<?php $this->endContent(); ?>

<?php $this->beginContent('/layouts/cms/slider',array('listData'=>$this->sliderList)); ?>
<?php $this->endContent(); ?>

<!--main-container-part-->
<div id="content" style="margin-top: -38px;">
    <?=$content?>
</div>

<!--end-main-container-part-->

<?php $this->beginContent('/layouts/cms/foot'); ?>
<?php $this->endContent(); ?>

