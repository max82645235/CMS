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
        $listData = $model->getTableList();
        $this->render('tableList',array('listData'=>$listData));
    }

    /*
     *  一级菜单
     */
    public function actionFirstMenu(){
        $actionType = 'actionType';
        $recordId = 'id';
        $curdObj = new CurdAction($actionType,$recordId);
        $topList = Sliderbar::getTopRecordList();
        if($curdObj->isAdd()){
            $model = new Sliderbar();
            if(isset($_POST['Sliderbar'])){
                $model->setAttributes($_POST['Sliderbar']);
                if($model->save()){
                    Util::alertJs(CurdAction::SAVE_SUCCESS,'/sliderbar/tableList');
                }else{
                    Util::alertJs(CurdAction::SAVE_FAIL);
                }
            }
            $this->render('firstMenu',
                array('model'=>$model,'curdObj'=>$curdObj,'topList'=>$topList)
            );
        }elseif($curdObj->isEdit()){
            $model = Sliderbar::model()->findByPk($curdObj->$recordId);
            if(isset($_POST['Sliderbar'])){
                $model->setAttributes($_POST['Sliderbar']);
                if($model->save()){
                    Util::alertJs(CurdAction::UPDATE_SUCCESS,'/sliderbar/tableList');
                }else{
                    Util::alertJs(CurdAction::UPDATE_FAIL);
                }
            }
            $this->render('firstMenu',
                array('model'=>$model,'curdObj'=>$curdObj,'topList'=>$topList)
            );
        }elseif($curdObj->isDel()){
            $res = Sliderbar::model()->deleteByPk($curdObj->$recordId);
            if($res){
                Util::alertJs(CurdAction::DEL_SUCCESS,'/sliderbar/tableList');
            }else{
                Util::alertJs(CurdAction::DEL_FALI);
            }
        }else{
            Util::alertJs('','/sliderbar/tableList');
        }
    }

}
