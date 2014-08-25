<?php

class FinanceController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public $layout='cms/content';

    //财务流水
    public function actionIndex()
    {
        $model = Finance::model()->recently();
        if(Yii::app()->request->isAjaxRequest){
            $model->setAttributes($_REQUEST);
            if($_REQUEST['startTime'])
                $model->startTime = $_REQUEST['startTime'];
            if($_REQUEST['endTime'])
                $model->endTime = $_REQUEST['endTime'];
            $this->renderPartial('/layouts/listView',array(
                'dp'=>$model->search(),
                'itemView'=>'_itemView'
            ));
            Yii::app()->end();
        }else{
            $financeTypeData = FinanceType::model()->findAll();
            $financeTypeList = FinanceType::getLabelDropDownList($financeTypeData,array('name'=>'type','style'=>'width:200px;'));
            $this->render('index',array(
                'model'=>$model,
                'financeTypeList'=>$financeTypeList
            ));
        }
    }

    public function actionCurd(){
        $actionType = CurdAction::getRequestValue('actionType');
        $recordId = CurdAction::getRequestValue('id');
        $className = 'Finance';
        if($actionType=='del')
            $redirectUrl = '/finance/index';
        else
            $redirectUrl = Yii::app()->request->requestUri;
        $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
        $curdObj->initMod();
        $curdObj->DataHandler();
        $model = $curdObj->getMod();
        //当日累计记录列表
        $currentDayRecord = $model->getCurrentDayRecord();
        $this->render('curd',
            array('model'=>$model,'curdObj'=>$curdObj,'currentDayRecord'=>$currentDayRecord)
        );
    }

    //收支类型
    public function actionTypeList(){
        $model = new FinanceType();
        $recordList = $model->findAll();
        $listData = Util::getTableList($recordList);
        $this->render('typeList',array('listData'=>$listData));
    }

    public function actionTypeCurd(){
        $actionType = CurdAction::getRequestValue('actionType');
        $recordId = CurdAction::getRequestValue('id');
        $className = 'FinanceType';
        $redirectUrl = '/finance/typeList';
        $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
        $curdObj->initMod();
        $curdObj->DataHandler();
        $model = $curdObj->getMod();
        $topList = $model->getFList();
        $this->render('typeCurd',
            array('model'=>$model,'curdObj'=>$curdObj,'topList'=>$topList)
        );
    }

    //财务图表
    public function actionCharts(){
        $this->render('charts',array());
    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}