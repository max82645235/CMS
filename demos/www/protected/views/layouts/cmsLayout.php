<?php $this->beginContent('/layouts/cms/header'); ?>
<?php $this->endContent(); ?>

<?php $this->beginContent('/layouts/cms/slider'); ?>
<?php $this->endContent(); ?>

<!--main-container-part-->
<div id="content">
    <?=$content?>
</div>

<!--end-main-container-part-->

<?php $this->beginContent('/layouts/cms/foot'); ?>
<?php $this->endContent(); ?>

