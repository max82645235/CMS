<?php
class Util{
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
}