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

}