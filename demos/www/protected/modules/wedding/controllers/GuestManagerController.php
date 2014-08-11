<?php

class GuestManagerController extends Controller
{
    public $layout='application.views.layouts.cms.content';
	public function actionIndex()
	{
        $model = new WeddingGuest();
        $recordList = $model->findAll();
		$this->render('index',array(
            'recordList'=>$recordList
        ));
	}

    public function actionGuestCurd(){
        $actionType = CurdAction::getRequestValue('actionType');
        $recordId = CurdAction::getRequestValue('id');
        $className = 'WeddingGuest';
        $redirectUrl = '/wedding/guestManager/index';
        $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
        $curdObj->initMod();
        $model = $curdObj->getMod();
        $curdObj->DataHandler();
        $this->render('guestCurd',
            array('model'=>$model,'curdObj'=>$curdObj)
        );
    }

    public function actionSendEmail(){
        $ret = array('status'=>'');
        if(Yii::app()->request->isAjaxRequest){
            $record_id = $_POST['record_id'];
            $model = WeddingGuest::model()->findByPk($record_id);
            if($model){
                if($model->send_status==0){
                    //未发送
                    $emailConfig = array();
                    $emailConfig['qq'] = $model->qq;
                    $emailConfig['name'] = $model->name;
                    if(Util::weddingSendMailer($emailConfig)){
                        $ret['status'] = 'success';
                    }
                }else{
                    $ret['status'] = 'hasSend';
                }
            }
        }
        echo json_encode($ret);
    }

    public function actionEmailKeyConfirm(){
        if(Yii::app()->request->getParam('saltKey')){
            $saltKey = Yii::app()->request->getParam('saltKey');
            $model = WeddingGuest::model()->find('salt_key=:salt_key',array(':salt_key'=>$saltKey));
            if($model){
                $guestInfo = array();
                $guestInfo = $model->getAttributes();
                $cookie = new CHttpCookie('guestInfo',$guestInfo);
                $cookie->expire = time()+60*60*24*30;  //有限期1天
                Yii::app()->request->cookies['guestInfo']=$cookie;
            }
        }
        Yii::app()->request->redirect(Yii::app()->getBaseUrl(true).'/wedding');
    }
}