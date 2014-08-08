<?php

class siteController extends Controller
{
    public $layout='wedding';
    public function init(){

    }

    public function actionIndex()
    {
        $this->render('index');
    }
}