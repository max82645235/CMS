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
        /*CSS*/
        $jsPathPrifix = Yii::app()->baseUrl."/js/cms/";
        $cssPathPrifix = Yii::app()->baseUrl."/css/cms/css/";
        Yii::app()->clientScript->registerCssFile($cssPathPrifix.'bootstrap.min.css');
        Yii::app()->clientScript->registerCssFile($cssPathPrifix.'bootstrap-responsive.min.css');
        Yii::app()->clientScript->registerCssFile($cssPathPrifix.'uniform.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/cms/font-awesome/css/font-awesome.css');
        Yii::app()->clientScript->registerCssFile($cssPathPrifix.'matrix-style.css');
        /*JS*/
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.min.js');
        Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.ui.custom.js');
        Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'bootstrap.min.js');
        Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.ui.custom.js');
        Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.uniform.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/common.js');
    }

    //获取当前菜单名称
    public function getCurrentSliderInfo(){
        $currentUrl = Yii::app()->request->getUrl();
        $ret = '';
        if(isset(Yii::app()->user->sliderInfo)){
            foreach(Yii::app()->user->sliderInfo as $list){
                foreach($list as $key=>$val){
                    if($val['url'] == $currentUrl){
                        $ret = $val['title'];
                        break 2;
                    }
                }
            }
        }
        if(!$ret){
            if(isset($_GET['actionType'])){
                switch($_GET['actionType']){
                    case CurdAction::ADD:
                              $ret  = '新增';
                        break;

                    case CurdAction::EDIT:
                               $ret = '修改';
                        break;
                }
            }
        }
        return $ret;
    }
}