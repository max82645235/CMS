<?php
/**
 *   CMS左侧功能列表控制器
 */
class SliderbarController extends Controller
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

    /*
     *  功能TABLE列表
     */
    public function actionTableList(){
        $model = new Sliderbar();
        $recordList = $model->findAll();
        $listData = Util::getTableList($recordList);
        $this->render('tableList',array('listData'=>$listData));
    }

    /*
     *  一级菜单
     */
    public function actionFirstMenu(){
        $actionType = CurdAction::getRequestValue('actionType');
        $recordId = CurdAction::getRequestValue('id');
        $className = 'Sliderbar';
        $redirectUrl = '/sliderbar/tableList';
        $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
        $curdObj->initMod();
        $curdObj->DataHandler();
        $model = $curdObj->getMod();
        $topList = $model->getTopRecordList();
        $this->render('firstMenu',
            array('model'=>$model,'curdObj'=>$curdObj,'topList'=>$topList)
        );
    }
}
