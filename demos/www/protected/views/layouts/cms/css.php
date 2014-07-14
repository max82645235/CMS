<?php
/*css文件路径前缀*/
$cssPathPrifix = Yii::app()->baseUrl."/css/cms/css/";
?>
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php Yii::app()->clientScript->registerCssFile($cssPathPrifix.'fullcalendar.css');?>
    <?php Yii::app()->clientScript->registerCssFile($cssPathPrifix.'matrix-style.css');?>
    <?php Yii::app()->clientScript->registerCssFile($cssPathPrifix.'matrix-media.css');?>
    <?php Yii::app()->clientScript->registerCssFile($cssPathPrifix.'uniform.css');?>
    <?php Yii::app()->clientScript->registerCssFile($cssPathPrifix.'select2.css');?>
    <?php Yii::app()->clientScript->registerCssFile($cssPathPrifix.'datepicker.css');?>
    <?php Yii::app()->clientScript->registerCssFile($cssPathPrifix.'bootstrap-wysihtml5.css');?>
    <?php //Yii::app()->clientScript->registerCssFile($cssPathPrifix.'jquery.gritter.css');?>
</head>