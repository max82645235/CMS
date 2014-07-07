<?php
class CurdAction{
    /**
     * @var  $action  curd方式
     * @array  $request  $_REQUEST中指定值存入对象中
     */
    protected  $action;
    protected $recordId;
    const EDIT = 'edit';
    const ADD = 'add';
    const DEL = 'del';
    const SAVE_SUCCESS = '保存成功';
    const SAVE_FAIL = '保存失败';
    const UPDATE_SUCCESS = '更新成功';
    const UPDATE_FAIL = '更新失败';
    const DEL_SUCCESS = '删除成功';
    const DEL_FALI = '删除失败';
    public function __construct($action,$recordId){
        $this->action = $action;
        $this->recordId = $recordId;
    }


    public function isAdd(){
        return ($this->getRequestValue($this->action) == self::ADD)?true:false;
    }

    public function isEdit(){
        return ($this->getRequestValue($this->action) == self::EDIT)?true:false;
    }

    public function isDel(){
        return ($this->getRequestValue($this->action) == self::DEL)?true:false;
    }

    protected  function getRequestValue($key){
        if(isset($this->$key)){
            return $this->$key;
        }elseif(isset($_GET[$key])){
            $this->$key = $_GET[$key];
            return $_GET[$key];
        }elseif(isset($_POST[$key])){
            $this->$key = $_POST[$key];
            return $_POST[$key];
        }else{}
    }

    public function __set($name,$val){
        $this->$name = $val;
    }

    public  function __get($name){
        return $this->$name;
    }

    public function __isset($name){
        return isset($this->$name)?true:false;
    }

    public function getActionHidden(){
        $key = $this->action;
        $val = $this->getRequestValue($key);
        return CHtml::hiddenField($key,$val);
    }

    public function getRecordIdHidden(){
        $key = $this->recordId;
        $val = $this->getRequestValue($key);
        return CHtml::hiddenField($key,$val);
    }

    public function actionError($msg){
        throw new Exception($msg);
    }


}