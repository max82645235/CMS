<?php

/**
 * This is the model class for table "{{wedding_guest}}".
 *
 * The followings are the available columns in table '{{wedding_guest}}':
 * @property integer $id
 * @property string $name
 * @property integer $wedding_status
 * @property string $salt_key
 * @property string $create_time
 * @property string $update_time
 * @property integer $qq
 * @property integer $send_status
 */
class WeddingGuest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{wedding_guest}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, qq', 'required'),
			array('wedding_status, qq, send_status', 'numerical', 'integerOnly'=>true),
			array('name, salt_key', 'length', 'max'=>100),
			// The following rule is used by search().
            array('wedding_status,salt_key,tel,message,update_time','required','on'=>'web_form'),
			// @todo Please remove those attributes that should not be searched.
			array('id, name, wedding_status, salt_key, create_time, update_time, qq, send_status，tel', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => '姓名',
			'wedding_status' => '参加婚庆状态',
			'salt_key' => '秘钥',
			'create_time' => '创建时间',
			'update_time' => '更新时间',
			'qq' => 'QQ号码',
            'tel'=>'电话号码',
			'send_status' => '请帖发送状态',
            'message'=>'留言'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('wedding_status',$this->wedding_status);
		$criteria->compare('salt_key',$this->salt_key,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('qq',$this->qq);
		$criteria->compare('send_status',$this->send_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WeddingGuest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord){
                $this->create_time = date('Y-m-d H:i:s');
                $this->salt_key = CPasswordHelper::hashPassword($this->name.$this->create_time);
            }
            return true;
        }
        else
            return false;
    }


    static $weddingStatusArr = array(
        '1'=>'确定参加',
        '2'=>'不确定',
        '3'=>'不参加'
    );
    public static function getWeddingStatus($status){
        $ret = '';
        if($status==1){
            $ret = '<span style="color: green;">'.self::$weddingStatusArr[$status].'</span>';
        }elseif($status==2){
            $ret = '<span style="color: yellow;">'.self::$weddingStatusArr[$status].'</span>';
        }elseif($status==3){
            $ret = '<span style="color: red;">'.self::$weddingStatusArr[$status].'</span>';
        }else{
            $ret = '等待回复中';
        }
        return $ret;
    }

    static $sendStatusArr = array(
        '0'=>'未发送',
        '1'=>'已发送'
    );
    public static function getSendStatus($status){
        $ret = '';
        if($status==0){
            $ret = '<span style="color: red;">'.self::$sendStatusArr[$status].'</span>';
        }elseif($status==1){
            $ret = '<span style="color: green;">'.self::$sendStatusArr[$status].'</span>';
        }
        return $ret;
    }
}
