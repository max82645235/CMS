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
            $model['update_time'] = date('Y-m-d H:i:s');
            if($model->save()){
                unset(Yii::app()->request->cookies['guestInfo']);
                echo 'sent';
            }
        }
    }

    public function actioncontactForm(){
        if(Yii::app()->request->isAjaxRequest){
            $model = new Message();
            $model->name = $_POST['contactname'];
            $model->email = $_POST['contactemail'];
            $model->message = $_POST['contactmessage'];
            if($model->save(false)){
                echo 'sent';
            }
        }
    }

    public function actionMap(){
        $this->renderPartial('map');
    }
}