<?php

/**
 * This is the model class for table "{{collector_rules}}".
 *
 * The followings are the available columns in table '{{collector_rules}}':
 * @property integer $id
 * @property integer $rule_type
 * @property string $rule_str
 * @property integer $rule_status
 * @property string $create_time
 * @property integer $collector_id
 */
class CollectorRules extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{collector_rules}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rule_type, rule_str, rule_status, create_time, collector_id', 'required'),
			array('rule_type, rule_status, collector_id', 'numerical', 'integerOnly'=>true),
			array('rule_str', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rule_type, rule_str, rule_status, create_time, collector_id', 'safe', 'on'=>'search'),
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
            'collector'=>array(self::BELONGS_TO,'Collector','collector_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rule_type' => '规则类型',
			'rule_str' => '规则字符',
			'rule_status' => '规则状态',
			'create_time' => '创建时间',
			'collector_id' => '关联主键',
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
		$criteria->compare('rule_type',$this->rule_type);
		$criteria->compare('rule_str',$this->rule_str,true);
		$criteria->compare('rule_status',$this->rule_status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('collector_id',$this->collector_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            //echo $this->financeType->payIncome;exit;

            if($this->isNewRecord){
                $this->create_time= date('Y-m-d H:i:s');
            }
            return true;
        }
        else
            return false;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CollectorRules the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    //获取当前id下所有的规则纪录
    public function getCurrentRulesRecord(){
        if($this->collector_id){
            $ret = $this->model()->findAllByAttributes(array('collector_id'=>$this->collector_id));
            return $ret;
        }
    }

    //规则类型
    static $rule_type_arr = array(
        '1'=>'字符串匹配',
        '2'=>'正则匹配'
    );
    static function getRuleType($rule_type){
        if(array_key_exists($rule_type,self::$rule_type_arr)){
            return self::$rule_type_arr[$rule_type];
        }
    }

    //规则状态
    static $rule_status_arr = array(
        '1'=>'开放注册',
        '2'=>'未开放',
        '3'=>'未知'
    );
    static function getRuleStatus($rule_status){
        if(array_key_exists($rule_status,self::$rule_status_arr)){
            return self::$rule_status_arr[$rule_status];
        }
    }
}
