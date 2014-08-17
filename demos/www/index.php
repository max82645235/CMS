<?php
// change the following paths if necessary
header("Content-type: text/html; charset=utf-8");
ini_set('display_errors','on');
$config=dirname(__FILE__).'/protected/config/main.php';
if(strpos($_SERVER['SERVER_NAME'],'itaotao.me')){
    $yii = dirname(__FILE__).'/framework/yii.php'; //线上
    $config = dirname(__FILE__).'/protected/config/main_www.php';
}else{
    $yii = dirname(__FILE__).'/../../../framework/yii.php'; //家中
    if(!is_file($yii))
        $yii = dirname(__FILE__).'/../../framework/yii.php'; //公司
}


// remove the following line when in production mode
// defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
