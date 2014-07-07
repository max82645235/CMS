<?php
class CurdAction{
    /**
     * @var  $action  curd方式Request键名  如 $_GET['actionType'] 中 actionType
     * @var  $recordId  数据记录主键id
     * @var  $className  AR类名
     * @var  $redirectUrl  操作成功跳转地址
     */
    protected  $action;
    protected $recordId;
    protected $model;
    protected $status;
    protected $className;
    protected $redirectUrl;
    const EDIT = 'edit';
    const ADD = 'add';
    const DEL = 'del';
    const SUCCESS = 1;
    const FAIL = 0;
    protected $resultMsg = array(
        'edit'=>array(
            '0'=>'保存失败',
            '1'=>'保存成功'
        ),
        'add'=>array(
            '0'=>'新增失败',
            '1'=>'新增成功'
        ),
        'del'=>array(
            '0'=>'删除失败',
            '1'=>'删除成功'
        )
    );
    public function __construct($action,$recordId,$className,$redirectUrl){
        $this->action = $action;
        $this->recordId = $recordId;
        $this->redirectUrl = $redirectUrl;
        $this->className = $className;
        $this->setMod();
    }

    protected  function setMod(){
        $className = $this->className;
        $id = $this->getRequestValue($this->recordId);
        switch($this->getRequestValue($this->action)){
            case self::ADD:
                            $this->model = new $className();
                break;

            case self::EDIT:
                            $this->model = $className::model()->findByPk($id);
                break;

            case self::DEL:
                            $this->model = $className::model()->deleteByPk($id);
                break;

            default:
                     $this->actionError(' actionType is error');
               break;
        }
    }

    public function getMod(){
        return $this->model;
    }

    public function DataHandler(){
        if($this->isDel() && $this->model){
            $this->status = self::SUCCESS;
        }elseif($post = $this->getRequestValue($this->className)){
            $this->model->setAttributes($post);
            if($this->model->save())
                $this->status = self::SUCCESS;
        }else{
            return true;
        }
        $this->alertMsg();
    }

    protected function alertMsg(){
        $action = $this->getRequestValue($this->action);
        $msg = $this->resultMsg[$action][$this->status];
        $url = ($this->status == self::SUCCESS)?$this->redirectUrl:'';
        Util::alertJs($msg,$url);
    }

    protected function isDel(){
        return ($this->getRequestValue($this->action) == self::DEL)?true:false;
    }

    protected function getRequestValue($key){
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
        return CHtml::activeHiddenField($this->model,$this->recordId);
    }

    public function actionError($msg){
        throw new Exception($msg);
    }


}