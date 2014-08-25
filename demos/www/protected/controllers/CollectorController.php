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
        if(Yii::app()->user->id){
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
        }else{
            throw new Exception(404);
        }
    }

	public function actionShow(){
        $this->render('show');
    }

    public function actionSingleCollect(){
        if(Yii::app()->user->id){
            $ret = array();
            $id = Yii::app()->request->getParam('record_id');
            $model = new Collector();
            $status = $model->collectHandle($id);
            $ret['html'] = $model::getStatus($status);
            $ret['status'] = 'success';
            if(Yii::app()->request->isAjaxRequest){
                echo json_encode($ret);
            }
        }else{
            throw new Exception(404);
        }
    }

    public function actionMultiCollect(){
        if(Yii::app()->request->isAjaxRequest && Yii::app()->user->id || !Yii::app()->user->id){
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
            }elseif(!Yii::app()->user->id){
                echo 'success';
            }
        }
    }

    public function actionRemoteCollect(){
        $this->actionMultiCollect();
    }



    //设置采集规则
    public function actionSetCollectorRules(){
        if(Yii::app()->user->id){
            $actionType = Yii::app()->request->getParam('actionType');
            $recordId = Yii::app()->request->getParam('id');
            $collector_id = Yii::app()->request->getParam('collector_id');
            $className = 'CollectorRules';
            $redirectUrl = Yii::app()->request->requestUri;
            $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
            $curdObj->initMod();
            $curdObj->DataHandler();
            $model = $curdObj->getMod();
            //当前ID下采集规则列表
            if(!$model->collector_id && $collector_id)
                $model->collector_id = $collector_id;
            $currentRulesRecord = $model->getCurrentRulesRecord();
            $this->render('setCollectorRules', array(
                'model'=>$model,'curdObj'=>$curdObj,
                'currentRulesRecord'=>$currentRulesRecord
            ));
        }else{
            throw new Exception('errors',404);
        }
    }
}