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
                $model->get_page_content($url,'',false);
            }
        }
        if(Yii::app()->request->isAjaxRequest){
            echo 1;
        }else{
            echo 'success';
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

    public function actionDelRecord(){
        if(Yii::app()->request->isAjaxRequest){
            $recordId = Yii::app()->request->getParam('record_id');
            $ret = CollectorRules::model()->deleteByPk($recordId);
            if($ret){
                echo 'success';
            }
        }
    }

    //对外提供api接口
    public function actionRemoteCollectorApi(){
        $apiJson = array();
        $model = Collector::model()->findAll();
        if($model){
            $ret = array();
            $count = 0;
            foreach($model as $key=>$val){
                $ret[$key]['web_name'] = $val['title'];
                $ret[$key]['web_url'] = $val['url'];
                $ret[$key]['web_status'] = $val['status'];
                $ret[$key]['update_time'] = $val['update_time'];
                $ret[$key]['update_time'] = $val['update_time'];
                $ret[$key]['web_fname'] = $val['web_fname'];
                $ret[$key]['web_icon'] = $val['web_icon'];
                $ret[$key]['status_name'] = CollectorRules::$rule_status_arr[$val['status']];
                $count++;
            }
            $apiJson['result'] = $ret;
            $apiJson['count'] = $count;
            $apiJson['status'] = 'success';
        }else{
            $apiJson['status'] = 'empty';
        }
        echo json_encode($apiJson);
    }
}