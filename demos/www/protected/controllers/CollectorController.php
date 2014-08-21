<?php

class CollectorController extends Controller
{
    public $layout='cms/content';
	public function actionIndex()
	{
        $model = new Collector();
        $recordList = $model->findAll();

        $this->render('index',array(
            'recordList'=>$recordList,
            'model'=>$model
        ));
	}

    public function actionCurd(){
        $actionType = CurdAction::getRequestValue('actionType');
        $recordId = CurdAction::getRequestValue('id');
        $className = 'Collector';
        $redirectUrl = '/collector/index';
        $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
        $curdObj->initMod();
        $model = $curdObj->getMod();
        $curdObj->DataHandler();
        $this->render('collectorCurd',
            array('model'=>$model,'curdObj'=>$curdObj)
        );
    }

	public function actionShow(){
        $this->render('show');
    }

    public function actionSingleCollect(){
        $ret = array();
        $id = Yii::app()->request->getParam('record_id');
        $model = new Collector();
        $status = $model->collectHandle($id);
        $ret['html'] = $model::getStatus($status);
        $ret['status'] = 'success';
        if(Yii::app()->request->isAjaxRequest){
            echo json_encode($ret);
        }
    }

    public function actionMultiCollect(){
        $model = Collector::model();
        $recordList = $model->findAll();
        if($recordList){

            foreach($recordList as $val){
                $url = Yii::app()->request->hostInfo.'/collector/SingleCollect/record_id/'.$val->id;
                $model->curlMethod($url);
            }
        }
        if(Yii::app()->request->isAjaxRequest){
            echo 1;
        }
    }
}