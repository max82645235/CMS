<?php

/**
 * This is the model class for table "{{finance_type}}".
 *
 * The followings are the available columns in table '{{finance_type}}':
 * @property integer $id
 * @property string $title
 * @property integer $fid
 * @property string $createTime
 */
class FinanceType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{finance_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, payIncome', 'required'),
			array('fid,payIncome', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, fid, createTime,payIncome', 'safe', 'on'=>'search'),
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
			'title' => '名称',
			'fid' => '父类',
			'createTime' => 'Create Time',
            'payIncome' =>'收入支出'
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
		$criteria->compare('fid',$this->fid);
        $criteria->compare('payIncome',$this->payIncome);
		$criteria->compare('createTime',$this->createTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FinanceType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

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

    public function getFList(){
        $record = $this->model()->findAll('fid is null');
        $listData =  CHtml::listData($record,'id','title');
        if($this->id)
            unset($listData[$this->id]);
        return $listData;
    }


    //获取带层级排列标签样式的数据节点数据
    public static function getLabelDropDownList($listData,$htmlOptions=array(),$selectId=NULL){
        $tmp = array();
        $retHtml = '';
        $htmlOptionsStr = '';
        if(is_array($listData)){
            foreach($listData as $key=>$val){

                if($val['fid']){
                    $tmp[$val['fid']]['son'][] = array('title'=>'&nbsp;&nbsp;&nbsp;&nbsp;┄┈┄┈'.$val['title'],'id'=>$val['id']);
                }else{
                    $tmp[$val['id']]['father'] = array('title'=>'┎'.$val['title'],'id'=>$val['id']);
                }
            }
            if($htmlOptions){
                foreach($htmlOptions as $key=>$val){
                    $htmlOptionsStr.="{$key}=\"{$val}\"";
                }
            }
            $retHtml = '<select '.$htmlOptionsStr.' >';
            $retHtml.= '<option value="">请选择</option>';
            foreach($tmp as $fid=>$val){
                if(isset($val['father'])){
                    $fid = $val['father']['id'];
                    $title = $val['father']['title'];
                    $selected = ($selectId==$fid)?'selected=selected':'';
                    $retHtml.="<option value='".$fid."' $selected>".$title;
                    if(isset($val['son'])){
                        foreach($val['son'] as $son){
                            $sonId = $son['id'];
                            $sonTitle = $son['title'];
                            $selected = ($selectId==$sonId)?'selected=selected':'';
                            $retHtml.="<option value='".$sonId."' $selected>".$sonTitle;
                        }
                    }
                }
            }
            $retHtml.="</select>";
        }
        return $retHtml;
    }

}
