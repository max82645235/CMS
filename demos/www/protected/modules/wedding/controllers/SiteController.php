<?php

class siteController extends Controller
{
    public $layout='wedding';
    public function init(){

    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionGuestForm(){
        if(Yii::app()->request->isAjaxRequest && Yii::app()->request->cookies['guestInfo']){
            $guestInfo = unserialize(Yii::app()->request->cookies['guestInfo']);
            $model = WeddingGuest::model()->findByPk($guestInfo['id']);
            $model->setScenario('web_form');
            $model['tel'] = $_POST['form_tel'];
            $model['wedding_status'] = $_POST['form_select'];
            $model['message'] = $_POST['form_message'];
            if($model->save()){
                echo 'sent';
            }
        }
    }
}