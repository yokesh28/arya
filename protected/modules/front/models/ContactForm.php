<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $message;
	public $number;
	public $ref = 'DIRECT';

	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('name, email, message, number', 'required'),
			// rememberMe needs to be a boolean
			array('email', 'email'),
			array('number','match','pattern'=>'/^([0-9]{10,})$/')
				
				
				
				
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Name',
			'email'=>'Email',
			'message'=>'Message',
		);
	}
	
	public function process(){
		$config = ConfigApi::model();
		$contact = new Contacts;
		$contact->reference = $this->ref;
		$contact->name = $this->name;
		$contact->email = $this->email;
		$contact->message = $this->message;
		$contact->time = date('Y-m-d H:m:s');
		$contact->number = $this->number;
		$contact->ip = SecurityUtils::getRealIp();
		$data['contact'] = $contact;
		if($contact->save()) {
				EmailApi::createEmail($config->TO_EMAIL,'CONTACT.RECEIVED',$data,false,false,false,false,false);
				SmsApi::sendSms($config->TO_NUMBER,false,$data,'CONTACT.RECEIVED',false);
		}		
		return true;
	}
}
