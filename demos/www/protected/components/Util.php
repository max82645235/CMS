<?php
class Util{
    static $titleInfo = array(
        'add'=>'添加记录',
        'edit'=>'修改记录'
    );
    static function alertJs($msg='',$redirectUrl=''){
        if($msg)
            echo '<script>alert("'.$msg.'");</script>';
        if($redirectUrl)
            echo "<script>location.href='".$redirectUrl."';</script>";
    }


    /**
     *   PHP脚本数组打印调试
     */
    static function dumpArr($arr){
        if(is_array($arr)){
            echo '<pre>';
            print_r($arr);
            echo '</pre>';
            die();
        }
    }

    static function datePicker($dateList){
        $date = date('Y-m-d');
        if(isset($dateList['format']) && isset($dateList['date'])){
            $format = $dateList['format'];
            $date = date('Y-m-d');
        }
        $span = (isset($dateList['span']))?$dateList['span']:'span2';
        return CHtml::textField($dateList['name'],'',array('class'=>'datepicker '.$span,'data-date-format'=>'yyyy-mm-dd','date'=>$date));
    }

    /*获取功能菜单列表TABLE数据*/
    static function getTableList($recordList){
        $tableList = array();
        $tmpList = array();
        if($recordList){
            foreach($recordList as $val){
                $aList = $val->getAttributes();
                if($val->fid){
                    //子节点
                    $id = $val->fid;
                }else{
                    $id = $val->id;
                    $tableList['fidInfo'][$id] = $aList;
                    $tableList['fatherList'][] = $id;
                }
                $id = ($val->fid)?$val->fid:$val->id;
                $tmpList[$id][] = $aList;
            }
            if($tmpList){
                $resultList = array();
                foreach($tmpList as $key=>$val){
                    if(in_array($key,$tableList['fatherList'])){
                        $resultList = array_merge($resultList,$val);
                    }
                }
                $tableList['tableInfo'] = $resultList;
            }
        }
        return $tableList;
    }

    static function weddingSendMailer($emailConfig){
        $mailer = Yii::createComponent('application.extensions.email.PHPMailer');
        $message = 'hi,'.$emailConfig['name'];
        $mailer->Host = 'smtp.126.com';
        $mailer->IsSMTP();
        $mailer->SMTPAuth = true;
        $mailer->Subject = '王明察&张婷婷-婚庆电子请帖';
        $mailer->From = 'wmcdyx@126.com';
        $mailer->AddReplyTo('273778324@qq.com');
        $mailer->AddAddress($emailConfig['qq'].'@qq.com');
        $mailer->FromName = '王明察&张婷婷';
        $mailer->Username = 'wmcdyx';    //这里输入发件地址的用户名
        $mailer->Password = 'Wmc82645235';    //这里输入发件地址的密码
        $mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
        $mailer->CharSet = 'UTF-8';
        $mailer->Body = $message;
        return $mailer->Send();
    }
}