<?php
/**
 *   CMS左侧功能列表控制器
 */
class SliderbarController extends Controller
{
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
