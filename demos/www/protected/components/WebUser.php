<?php
class WebUser extends CWebUser{
    //���û��������ϢSESSION�־û�
    public function setUserInfo($info){
        $this->setState('userInfo',$info);
    }
}