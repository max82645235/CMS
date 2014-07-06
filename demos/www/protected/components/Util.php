<?php
class Util{
    const SAVE_SUCCESS = '保存成功';
    const SAVE_FAIL = '保存失败';
    static function alertJs($msg,$redirectUrl=''){
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
            echo '<pre>';
            die();
        }
    }
}