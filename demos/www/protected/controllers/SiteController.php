<?php

class SiteController extends Controller
{
	public $layout='cmsLayout';
    public $sliderList;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

    public function actionIndex(){
        if(!Yii::app()->user->id)
            $this->redirect(Yii::app()->user->loginUrl);

        $listData = Sliderbar::getSliderbarList();
        $this->sliderList = $listData;
        $this->render('index');
    }

    /*主页内容*/
    public function actionHome(){
        $this->layout = 'cms/content';
        $this->render('home');
    }

    /*用户登录*/
    public function actionLogin(){
        if(Yii::app()->user->id)
            $this->redirect(Yii::app()->homeUrl);
        $model=new LoginForm;
        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                Util::alertJs('登录成功','/site/index');
        }

        // display the login form
        $this->layout = 'column0';
        $this->render('login',array('model'=>$model));
    }

    /*用户登出*/
    public function actionLoginOut(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}
