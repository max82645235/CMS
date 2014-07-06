<?php

// change the following paths if necessary
header("Content-type: text/html; charset=utf-8");
$yii = dirname(__FILE__).'/../../../framework/yii.php';
if(!is_file($yii))
    $yii = dirname(__FILE__).'/../../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
// remove the following line when in production mode
// defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
