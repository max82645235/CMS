<!DOCTYPE html>
<html lang="en">
<?php

$cssPathPrifix = Yii::app()->baseUrl."/css/cms/css/";


$jsPathPrifix = Yii::app()->baseUrl."/js/cms/";
?>
<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php Yii::app()->clientScript->registerCssFile($cssPathPrifix.'matrix-login.css');?>
    <?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'matrix.login.js');?>
</head>
<body>
<div id="loginbox">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableAjaxValidation'=>true,
    )); ?>
        <div class="control-group normal_text"> <h3><img src="<?=Yii::app()->baseUrl?>/img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"></i></span>
                    <?php echo $form->textField($model,'username',array('placeholder'=>'用户名','style'=>'margin-left:-7px;')); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <?php echo $form->passwordField($model,'password',array('placeholder'=>'密码','style'=>'margin-left:-7px;')); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
            <span class="pull-right"><a type="submit" href="javascript:;" class="btn btn-success" onclick="login();"/> Login</a></span>
        </div>
    <?php $this->endWidget(); ?>
    <!--<form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
        </div>
    </form>-->
</div>
<script>
    function login(){
       $('#login-form').trigger('submit');
    }
</script>
</body>
</html>

