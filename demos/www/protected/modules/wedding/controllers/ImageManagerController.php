<?php

class ImageManagerController extends Controller
{
    public $layout='application.views.layouts.cms.content';
    //图片管理列表
	public function actionIndex()
	{
        $model = new WeddingImage();
        $recordList = $model->with('GalleryType')->findAll();
		$this->render('index',array('recordList'=>$recordList));
	}

    public function actionImageCurd(){
        $actionType = CurdAction::getRequestValue('actionType');
        $recordId = CurdAction::getRequestValue('id');
        $className = 'WeddingImage';
        $redirectUrl = '/wedding/imageManager/index';
        $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
        $curdObj->initMod();
        $model = $curdObj->getMod();
        $curdObj->DataHandler();

        $this->render('imageCurd',
            array('model'=>$model,'curdObj'=>$curdObj)
        );
    }

    //图片走廊分类
    public function actionGalleryClassify(){
        $model = new GalleryType();
        $recordList = $model->findAll();
        $this->render('galleryClassify',array('recordList'=>$recordList));
    }

    //图片走廊curd
    public function actionGalleryCurd(){
        $actionType = CurdAction::getRequestValue('actionType');
        $recordId = CurdAction::getRequestValue('id');
        $className = 'GalleryType';
        $redirectUrl = '/wedding/imageManager/galleryClassify';
        $curdObj = new CurdAction($actionType,$recordId,$className,$redirectUrl);
        $curdObj->initMod();
        $curdObj->DataHandler();
        $model = $curdObj->getMod();
        $this->render('galleryCurd',
            array('model'=>$model,'curdObj'=>$curdObj)
        );
    }
}