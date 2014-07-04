<?php
class Form{

    //数组元素转html
    protected static function arrToHtml($arr){
        $html = '';
        if(is_array($arr)){

            foreach($arr as $key=>$val){
                $html.=" {$key}=\"{$val}\"";
            }
        }
        return $html;
    }

    //获取HTML表单元素
    protected static function initElement($widgetData,$inputData,$tag,$init=true){
        $html = '';
        if($widgetData){
            if($init){
                foreach($widgetData as $key=>$val){
                    if(!array_key_exists($key,$inputData)){
                        $inputData[$key] = $val;
                    }
                }
            }
            $html = "<{$tag} ".self::arrToHtml($inputData).">";
        }
        return $html;
    }

    //组装通用表单元素挂件
    public static function getCommonWidget($title,$element){
        $widget = ' <div class="control-group">
                        <label class="control-label">'.$title.' :</label>
                        <div class="controls">'.$element.'</div>
                    </div>';
        return $widget;
    }


    public static function inputTextWidget($title,$data=array(),$init=true){
        $inputInit = array(
            'type'=>'text'
        );
        $inputHtml = self::initElement($inputInit,$data,'input',$init);
        $inputHtml = self::getCommonWidget($title,$inputHtml);
        return $inputHtml;
    }

    public static function beginForm($data=array(),$init=true){
        $formInit = array(
            'class'=>'form-horizontal',
            'method'=>'post',
            'action'=>'',
            'id'=>'basic_validate',
            'novalidate'=>'novalidate'
        );
        $formHtml = self::initElement($formInit,$data,'form',$init);
        return $formHtml;
    }

    public static function endForm(){
        return '</form>';
    }

    public static function dropDownListWidget($title,$data=array(),$select='0'){
        $selectHtml = '';
        if($data['data']){
            $selectHtml = '<select>';
            foreach($data['data'] as $key=>$val){
                $selected = ($key==$select)?'selected=selected':'';
                $selectHtml.="<option {$selected}>{$val}</option>";
            }
            $selectHtml.="</select>";
        }
        $inputHtml = self::getCommonWidget($title,$selectHtml);
        return $inputHtml;
    }

}