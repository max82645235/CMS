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

    static function datePicker($date=array()){
        $format = 'yyyy-mm-dd';
        $date = date($format);
        if(isset($date['format']) && isset($date['date'])){
            $format = $date['format'];
            $date = date($format);
        }
        return CHtml::telField('text','',array('class'=>'datepicker span2','data-date-format'=>$format));
    }
}