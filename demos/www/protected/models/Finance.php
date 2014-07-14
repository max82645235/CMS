<?php

/**
 * This is the model class for table "{{finance}}".
 *
 * The followings are the available columns in table '{{finance}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property double $price
 * @property string $dayTime
 * @property string $createTime
 */
class Finance extends CActiveRecord
{
    static $typeList = array(
    );
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{finance}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, price, dayTime, createTime', 'required'),
			array('price', 'numerical'),
			array('title', 'length', 'max'=>300),
			array('content', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, content, price, dayTime, createTime', 'safe', 'on'=>'search'),
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
			'title' => '简述',
			'content' => '详情',
			'price' => '金额',
			'dayTime' => '进出帐日期',
			'createTime' => '记录时间',
            'type' =>'收支类型',
            'payIncome'=>'收入支出'
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('dayTime',$this->dayTime,true);
		$criteria->compare('createTime',$this->createTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>5
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Finance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
