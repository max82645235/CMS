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
    protected $status=0;
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
    }

    public static $events = array();


    public function initMod(){
        $className = $this->className;
        $recordId = $this->recordId;
        switch($this->action){
            case self::ADD:
                            $this->model = new $className();
                break;

            case self::EDIT:
                          $model = '';
                          eval("\$model = $className::model()->findByPk(\"$recordId\");");
                          $this->model = $model;
                break;

            case self::DEL:
                           $model = '';
                           eval("\$model = $className::model()->deleteByPk(\"$recordId\");");
                           $this->model = $model;
                break;

            default:
                     $this->actionError(' actionType is error');
               break;
        }
    }

    public function getMod(){
        return $this->model;
    }

    public function setMod(CActiveRecord $model){
        $this->model = $model;
    }

    public function setScenario($scenario=''){
        $scenario = ($scenario)?$scenario:$this->action;
        $this->model->setScenario($scenario);
    }

    public function DataHandler(){
        if($this->isDel() && $this->model){
            $this->status = self::SUCCESS;
        }elseif($post = self::getRequestValue($this->className)){

            $this->model->setAttributes($post);
            if($this->model->save())
                $this->status = self::SUCCESS;
        }else{
            return true;
        }
        $this->alertMsg();
    }

    protected function alertMsg(){
        $action = $this->action;
        $msg = $this->resultMsg[$action][$this->status];
        $url = ($this->status == self::SUCCESS)?$this->redirectUrl:'';
        Util::alertJs($msg,$url);
    }

    protected function isDel(){
        return ($this->action == self::DEL)?true:false;
    }

    static $requestValues = array();
    static function getRequestValue($key){
        if(isset(self::$requestValues[$key])){
            return self::$requestValues[$key];
        }elseif(isset($_GET[$key])){
            self::$requestValues[$key] = $_GET[$key];
            return $_GET[$key];
        }elseif(isset($_POST[$key])){
            self::$requestValues[$key] = $_POST[$key];
            return $_POST[$key];
        }else{}
    }

    public function getActionHidden($key='actionType'){
        $val = $this->action;
        return CHtml::hiddenField($key,$val);
    }

    public function getRecordIdHidden($key='id'){
        return CHtml::activeHiddenField($this->model,$key);
    }

    public function actionError($msg){
        throw new Exception($msg);
    }


}