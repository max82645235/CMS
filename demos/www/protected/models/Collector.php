<?php

/**
 * This is the model class for table "{{collector}}".
 *
 * The followings are the available columns in table '{{collector}}':
 * @property integer $id
 * @property string $keywords
 * @property string $title
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 * @property string $url
 */
class Collector extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{collector}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, url', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('url', 'length', 'max'=>200),
            array('end_str,user_agent,web_fname,web_icon','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, keywords, title, status, create_time, update_time, url', 'safe', 'on'=>'search'),
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
			'keywords' => '关键字',
			'title' => '网站名称',
			'url' => '网址',
            'status'=>'开放状态',
            'create_time'=>'创建时间',
            'update_time'=>'更新时间',
            'end_str'=>'结束字符',
            'user_agent'=>'浏览器',
            'web_fname'=>'友善站名',
            'web_icon'=>'网站图标'
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
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('url',$this->url,true);

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
            }else{
                $this->update_time= date('Y-m-d H:i:s');
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
	 * @return Collector the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    const DEFAULT_USER_AGENT = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';

    static $statusArr = array(
        '0'=>'新建',
        '1'=>'开放中',
        '2'=>'已关闭',
        '3'=>'未知'
    );

    public static function getStatus($status){
        $statusColor = array('0'=>'#000000','1'=>'green','2'=>'red','3'=>'#FF6F0F');
        return '<font style="color: '.$statusColor[$status].'">'.self::$statusArr[$status].'</font>';
    }


    const SUCCESS = 1;
    const FAIL = 2;
    const UNKNOWN = 3;
    public function collectHandle($id){
        $currentMod = $this->model()->findByPk($id);
        $webUrl = $currentMod->url;
        if($tmpContent = $this->get_page_content($webUrl,$currentMod->user_agent)){
            $encode = mb_detect_encoding($tmpContent,array('UTF-8','GBK','GB2312'));
            if($encode!='UTF-8'){
                $tmpContent = iconv($encode,"UTF-8//IGNORE",$tmpContent);
            }

            if($currentMod->end_str){
                if(!preg_match('/'.preg_quote($currentMod->end_str,'/').'$/',$tmpContent)){
                    $status = self::UNKNOWN;
                }
            }
            if(!isset($status))
                $status = CollectorRules::get_collector_status($id,$tmpContent);
        }else{
            $status = self::UNKNOWN;
        }
        $currentMod->status = $status;
        if($currentMod->save()){
            return $currentMod->status;
        }
    }




    public  function get_page_content($url,$user_agent='',$res=true){
        if(!$user_agent){
            $user_agent = self::DEFAULT_USER_AGENT;
        }
        if(strpos($url,'https')!==false){
            $ssl='ssl://';
            $url=str_replace('https://', '', $url);
        }else{
            $ssl='';
            $url=str_replace('http://', '', $url);
        }
        $url=str_replace('http://', '', $url);
        $temp=explode("/", $url);

        $host=array_shift($temp);
        $path="/".implode("/", $temp);

        $temp=explode(":",$host);
        $host=$temp[0];
        if(isset($temp[1])){
            $port = $temp[1];
        }else{
            $port = ($ssl)?443:80;
        }
        if($fp=@fsockopen($ssl.$host,$port,$errno,$errstr,5)){
            @fputs($fp,"GET $path HTTP/1.1\r\nHost: $host\r\nAccept: */*\r\nReferer:$url\r\nUser-Agent:".trim($user_agent)."\r\nConnection: Close\r\n\r\n");
        }
        if($res){
            $content="";
            while($str=@fread($fp,4096)) $content.=$str;
            @fclose($fp);

            // 重定向
            if(preg_match("/^HTTP\/\d.\d 301 Moved Permanently/is",$content)){
                if(preg_match("/Location:(.*?)\r\n/is",$content,$murl)){
                    return get_page_content($murl[1],$user_agent);
                }
            }

            // 读取内容
            if(preg_match("/^HTTP\/\d.\d 200 OK/is",$content)){
                preg_match("/Content-Type:(.*?)\r\n/is",$content,$murl);
                $contentType=trim($murl[1]);
                $content=explode("\r\n\r\n",$content,2);
                $content=$content[1];
            }
            return substr($content,0,strrpos($content,'>')+1);
        }else{
            @fclose($fp);
        }
    }

    function curlMethod($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        unset($ch);
    }

    static function getByPk($id){
        $model = self::model()->findByPk($id);
        return $model;
    }
}
