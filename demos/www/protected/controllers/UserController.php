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

    public function actionTableList(){

    }

    /*用户增删改查*/
    public function actionUserCurd(){
        $actionType = 'actionType';
        $recordId = 'id';
        $className = 'User';
        $redirectUrl = '/user/tableList';
        $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
        $curdObj->setScenario();
        $model = $curdObj->getMod();
        $curdObj->DataHandler();
        $this->render('userCurd',
            array('model'=>$model,'curdObj'=>$curdObj)
        );
    }
}
