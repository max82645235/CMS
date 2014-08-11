<?php
class Mailer{
    public function __construct(){
        $mailer = Yii::createComponent('application.extensions.mailer.PHPMailer');

    }

    public function set_init_config(){
        self::$mailer->Host = 'smtp.qq.com';
        self::$mailer->IsSMTP();
        self::$mailer->SMTPAuth = true;
        self::$mailer->From = 'from@163.com';
        self::$mailer->AddReplyTo('from@163.com');
        self::$mailer->AddAddress('to@qq.com');
        self::$mailer->FromName = 'myName';
        self::$mailer->Username = 'username';    //这里输入发件地址的用户名
        self::$mailer->Password = 'password';    //这里输入发件地址的密码
        self::$mailer->SMTPDebug = true;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
        self::$mailer->CharSet = 'UTF-8';
        self::$mailer->Subject = Yii::t('demo', 'Yii rulez!');
        self::$mailer->Body = $message;
        self::$mailer->Send();
    }

    public function send(){

    }

    static $mailer;
    static function getMailer(){
        if(!isset($mailer)){
            self::$mailer = new Mailer();
        }
        return self::$mailer;
    }
}