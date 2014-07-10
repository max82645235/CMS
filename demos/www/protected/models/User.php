<?php
class User extends CActiveRecord
{
    public $passwordFix;
    /**
     * Returns the static model of the specified AR class.
     * @return static the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('userName,password','required'),
            array('realName','match','pattern'=>'/^.+$/','allowEmpty'=>true)
        );
    }

    public function scopes()
    {
        return array(

        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(

        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'userName'=>'账号名',
            'password'=>'密码',
            'realName'=>'真实姓名',
            'passwordFix'=>'密码不变更'
        );
    }

    public function setAttribute($name,$value){
        if($name=='password'){
            //如果密码不变更选项为true，说明更新是未更改密码，否则需要对表单密码值加密入库
            $value = ($this->passwordFix)?$this->password:$this->hashPassword($value);
        }
        parent::setAttribute($name,$value);
    }


    /**
     * This is invoked before the record is saved.
     * @return boolean whether the record should be saved.
     */
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
                $this->createTime= date('Y-m-d H:i:s');
            return true;
        }
        else
            return false;
    }

    protected function afterSave(){
        parent::afterSave();
        //数据库更新完后需要更新SESSION
        $info = $this->getAttributes();
        Yii::app()->user->setUserInfo($info);
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }

    /**
     * Generates the password hash.
     * @param string password
     * @return string hash
     */
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
}