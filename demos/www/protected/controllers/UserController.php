<?php

class UserController extends Controller
{
    public $layout='cms/content';
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
          //  'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
      /*  return array(
            array('allow',  // allow all users to access 'index' and 'view' actions.
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated users to access all actions
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );*/
    }

    public function scopes()
    {
        return array(
            'orderBy'=>array(
                'order'=>'id ASC',
            )
        );
    }

    public function actionTableList(){
        $recordList = User::model()->orderBy()->findAll();
        $this->render('tableList',
            array('recordList'=>$recordList)
        );
    }

    /*用户增删改查*/
    public function actionUserCurd(){
        $actionType = CurdAction::getRequestValue('actionType');
        $recordId = Yii::app()->user->id;
        $className = 'User';
        $redirectUrl = '/user/tableList';
        $curdObj = new CurdAction($actionType,1,$className,$redirectUrl);
        $curdObj->initMod();
        $curdObj->setScenario();
        $model = $curdObj->getMod();
        $curdObj->DataHandler();
        $this->render('userCurd',
            array('model'=>$model,'curdObj'=>$curdObj)
        );
    }

    /*用户冻结*/
    public function actionUserFreeze(){
        $userId = Yii::app()->request->getParam('userId');
        $model = User::model()->findByPk($userId);
        if($model){
            if($model->status == 1){
                $model->status =0;
                if($model->save()){
                    Util::alertJs('冻结成功','/user/tableList');
                }
            }else{
                $model->status =1;
                if($model->save()){
                    Util::alertJs('解冻成功','/user/tableList');
                }
            }
        }
    }
}
