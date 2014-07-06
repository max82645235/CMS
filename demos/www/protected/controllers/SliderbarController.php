<?php
/**
 *   CMS左侧功能列表控制器
 */
class SliderbarController extends Controller
{
    public $layout='cms/content';

    /*
     *  一级菜单
     */
    public function actionFirstMenu(){
        $model = new Sliderbar();
        if(isset($_POST['Sliderbar'])){
            $model->setAttributes($_POST['Sliderbar']);
            if($model->save()){
                Util::alertJs(Util::SAVE_SUCCESS,$this->getRouteUrl());
            }else{
                Util::alertJs(Util::SAVE_FAIL);
            }
        }
        $this->render('firstMenu',
            array('model'=>$model)
        );
    }

    /*
     *  二级菜单
     */
    public function actionSecondMenu(){
        $this->render('secondMenu');
    }

}
