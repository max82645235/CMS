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
            array('title,top,sort','required'),
            array('url','checkSameUrl'),
            array('fid','checkFid'),
            array('icon','match','pattern'=>'/^[a-z A-Z]+$/','allowEmpty'=>true)
        );
    }

    public function scopes()
    {
        return array(
            'orderBy'=>array(
                'order'=>'fid ASC,sort ASC',
            )
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
            'url'=>'url地址',
            'fid'=>'父级id'
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

    /*自定义rules规则*/
    public function checkSameUrl($attribute,$params){
        if($this->top==0){
            $oldUrl = $this->findByAttributes(array('url'=>$this->url));
            if($oldUrl && $oldUrl->id!=$this->id){
                $this->addError($attribute, '该url地址已经存在!');
                return false;
            }
        }
    }

    public function checkFid($attribute,$params){
        if($this->top==0){
            $list = $this->findByAttributes(array('top'=>1,'id'=>$this->fid));
            if(!$list){
                $this->addError($attribute, 'Fid不存在');
            }
        }
    }

    /*获取顶级列表数组*/
    static function getTopRecordList(){
        $record = self::model()->findAll('top=1');
        return CHtml::listData($record,'id','title');
    }

    /*获取功能菜单列表TABLE数据*/
    public function getTableList(){
        $tableList = array();
        $recordList = $this->model()->findAll();
        $tmpList = array();
        if($recordList){
            foreach($recordList as $val){
                $aList = $val->getAttributes();
                if($val->fid){
                    $id = $val->fid;
                }else{
                    $id = $val->id;
                    $tableList['fidInfo'][$id] = $aList;
                }
                $id = ($val->fid)?$val->fid:$val->id;
                $tmpList[$id][] = $aList;
            }
            if($tmpList){
                $resultList = array();
                foreach($tmpList as $val){
                    $resultList = array_merge($resultList,$val);
                }
                $tableList['tableInfo'] = $resultList;
            }
        }
        return $tableList;
    }

    /*获取左侧菜单sliderbar数据*/
    static function getSliderbarList(){
        $recordList = self::model()->orderBy()->findAll();
        $tmpList = array();
        if($recordList){
            foreach($recordList as $val){
                $aList = $val->getAttributes();
                if($val->fid){
                    $id = $val->fid;
                }
                $id = ($val->fid)?$val->fid:$val->id;
                $tmpList[$id][] = $aList;
            }
        }
        return $tmpList;
    }
}