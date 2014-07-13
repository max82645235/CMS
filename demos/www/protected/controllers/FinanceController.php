<?php

class FinanceController extends Controller
{
	public function actionIndex()
	{
        $model = Finance::model();
        if(Yii::app()->request->isAjaxRequest){
            $this->renderPartial('/layouts/listView',array(
                'dp'=>$model->search(),
                'itemView'=>'_itemView'
            ));
            Yii::app()->end();
        }else{
            $this->render('index',array(
                'model'=>$model
            ));
        }
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}