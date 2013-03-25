<?php

/**
 * This is the model class for table "sms_providers".
 *
 * The followings are the available columns in table 'sms_providers':
 * @property integer $id
 * @property string $name
 * @property string $sms_url
 * @property string $balance_url
 * @property string $username
 * @property string $password
 * @property string $api_password
 * @property string $sender_id
 * @property integer $primary
 */
class SmsProviders extends ResourceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SmsProviders the static model class
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
		return 'sms_providers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, sms_url, balance_url, username, password, sender_id', 'required'),
			array('pri', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('sms_url, balance_url', 'length', 'max'=>200),
			array('username, password, api_password, sender_id', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sms_url, balance_url, username, password, api_password, sender_id, pri', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'sms_url' => 'Sms Url',
			'balance_url' => 'Balance Url',
			'username' => 'Username',
			'password' => 'Password',
			'api_password' => 'Api Password',
			'sender_id' => 'Sender',
			'pri' => 'Primary',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sms_url',$this->sms_url,true);
		$criteria->compare('balance_url',$this->balance_url,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('api_password',$this->api_password,true);
		$criteria->compare('sender_id',$this->sender_id,true);
		$criteria->compare('pri',$this->pri);

		return new CActiveDataProvider($this, array(
			'pagination'=>array(
        		'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
    		),		
			'criteria'=>$criteria,
		));
	}
	
	public function send($to,$message){
		
	//	var_dump($message);
		
		if( !function_exists("curl_init") &&
				!function_exists("curl_setopt") &&
				!function_exists("curl_exec") &&
				!function_exists("curl_close") ) {
			throw new CException("Curl not loaded.");
		}
		
		$ch = curl_init($this->sms_url);
		$encoded = '';

		$encoded .= urlencode('username').'='.urlencode($this->username).'&';
	//	$encoded .= urlencode('password').'='.urlencode($this->password).'&';
		$encoded .= urlencode('api_password').'='.urlencode($this->api_password).'&';
		$encoded .= urlencode('sender').'='.urlencode($this->sender_id).'&';
		$encoded .= urlencode('to').'='.urlencode($to).'&';
		$encoded .= urlencode('message').'='.urlencode($message).'&';
		$encoded .= urlencode('priority').'='.urlencode(2);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$encoded);
		
		curl_exec($ch);
		curl_close($ch);
		
		return true;
	}
	
	public function balance() {
		
		if( !function_exists("curl_init") &&
				!function_exists("curl_setopt") &&
				!function_exists("curl_exec") &&
				!function_exists("curl_close") ) {
			throw new CException("Curl not loaded.");
		}
		
		$ch = curl_init($this->balance_url);
		$encoded = '';
		
		$encoded .= urlencode('username').'='.urlencode($this->username).'&';
		$encoded .= urlencode('priority').'='.urlencode(2).'&';
		$encoded .= urlencode('api_password').'='.urlencode($this->api_password);
	
		curl_setopt($ch, CURLOPT_HEADER, 0);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$encoded);
		
		$message = curl_exec($ch);
		curl_exec($ch);
		curl_close($ch);
		
		
		return $message;
	}
	
	
}