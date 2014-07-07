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
}