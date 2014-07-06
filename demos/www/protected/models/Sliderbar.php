<?php
class Sliderbar extends CActiveRecord
{
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
        return '{{sliderbar}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('title,top,icon,sort','required')
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
            'title'=>'标题',
            'top'=>'顶级栏目',
            'icon'=>'图标',
            'sort'=>'排序',
            'url'=>'url地址'
        );
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
                $this->create_time= date('Y-m-d H:i:s');
            else
                $this->update_time = date('Y-m-d H:i:s');
            return true;
        }
        else
            return false;
    }

    /*获取顶级列表数组*/
    static function getTopRecordList(){
        $record = self::model()->findAll('top=1');

    }
}