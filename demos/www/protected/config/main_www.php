<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

    'name'=>'MertricCms',
    'HomeUrl'=>'/site/index',
    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    'defaultController'=>'wedding/site',

    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123456',
            // 'ipFilters'=>array(...IP 列表...),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
        ),
        'wedding'
    ),

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'class'=>'WebUser',
            'allowAutoLogin'=>true,
        ),
        /*'db'=>array(
            'connectionString' => 'sqlite:protected/data/blog.db',
            'tablePrefix' => 'tbl_',
        ),*/
        // uncomment the following to use a MySQL database

        'db'=>array(
            'connectionString' => 'mysql:host=121.127.248.152;dbname=a0817200015',
            'emulatePrepare' => true,
            'username' => 'a0817200015',
            'password' => '63479743',
            'charset' => 'utf8',
            'tablePrefix' => 'cms_',
        ),
        'urlManager'=>array(
            'urlFormat' => 'path',
            'showScriptName'=>false,
            'rules'=>array(
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            )
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages

                array(
                    'class'=>'CWebLogRoute',
                ),

            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>require(dirname(__FILE__).'/params.php'),
);