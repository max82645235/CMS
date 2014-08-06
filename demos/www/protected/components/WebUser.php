<?php
class WebUser extends CWebUser{
    //设置用户信息持久存储SESSION数据
    public function setUserInfo($info){
        $this->setState('userInfo',$info);
    }

    //将左侧功能结构做持久存储
    public function setSliderInfo($sliderList){
        $this->setState('sliderInfo',$sliderList);
    }
}