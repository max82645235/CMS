<?php
/**
 *   CMS左侧功能列表控制器
 */
class SilderbarController extends Controller
{
    public $layout='cms/content';

    /*
     *  一级菜单
     */
    public function actionFristMenu(){
        $model = Silderbar::model();
        if(isset($_POST['Silderbar'])){

        }
        $this->render('firstMenu',
            array('model'=>$model)
        );
    }

    /*
     *  二级菜单
     */
    public function actionSecondMenu(){

    }

}
