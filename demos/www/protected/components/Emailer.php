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
        self::$mailer->Username = 'username';    //�������뷢����ַ���û���
        self::$mailer->Password = 'password';    //�������뷢����ַ������
        self::$mailer->SMTPDebug = true;   //����SMTPDebugΪtrue���Ϳ��Դ�Debug���ܣ�������ʾȥ�޸�����
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