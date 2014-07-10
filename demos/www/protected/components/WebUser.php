<?php
class WebUser extends CWebUser{
    //将用户表相关信息SESSION持久化
    public function setUserInfo($info){
        $this->setState('userInfo',$info);
    }
}