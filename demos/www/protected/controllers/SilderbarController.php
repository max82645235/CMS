<?php
/**
 *   CMS��๦���б������
 */
class SilderbarController extends Controller
{
    public $layout='cms/content';

    /*
     *  һ���˵�
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
     *  �����˵�
     */
    public function actionSecondMenu(){

    }

}
