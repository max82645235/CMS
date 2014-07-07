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
        $listData = Sliderbar::getSliderbarList();
        $this->sliderList = $listData;
        $this->render('index');
    }

    public function actionFrameA(){
        $this->layout = 'cms/content';
        $this->render('error',array('data'=>'frameA'));
    }
}
