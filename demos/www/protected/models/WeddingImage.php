<?php

/**
 * This is the model class for table "{{wedding_image}}".
 *
 * The followings are the available columns in table '{{wedding_image}}':
 * @property integer $id
 * @property string $src
 * @property integer $type
 * @property string $create_time
 * @property string $update_time
 * @property integer $picOrder
 */
class WeddingImage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{wedding_image}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, src, status, title,create_time, update_time, picOrder', 'required'),
			array('id, status, picOrder,galleryType', 'numerical', 'integerOnly'=>true),
			array('src', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, src, status,title, create_time, update_time, picOrder,galleryType', 'safe', 'on'=>'search'),
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
            'GalleryType'=>array(self::BELONGS_TO,'GalleryType','galleryType')
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'src' => '外链地址',
			'status' => '状态',
            'title'=>'名称',
			'create_time' => '创建时间',
			'update_time' => '修改时间',
			'picOrder' => '图片顺序',
            'galleryType'=>'图片类型'
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
		$criteria->compare('src',$this->src,true);
		$criteria->compare('status',$this->status);
        $criteria->compare('title',$this->title);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('picOrder',$this->picOrder);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WeddingImage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
