<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to 'column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='column0';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function getRouteUrl(){
        $class = $this->getId() ;
        $action  = $this->getAction()->id;
        return '/'.$class.'/'.$action;
    }

    public function init(){
        $jsPathPrifix = Yii::app()->baseUrl."/js/cms/";
        $cssPathPrifix = Yii::app()->baseUrl."/css/cms/css/";
        Yii::app()->clientScript->registerCssFile($cssPathPrifix.'bootstrap.min.css');
        Yii::app()->clientScript->registerCssFile($cssPathPrifix.'bootstrap-responsive.min.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/cms/font-awesome/css/font-awesome.css');
        Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.min.js');
        Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.ui.custom.js');
        Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'bootstrap.min.js');
    }

}