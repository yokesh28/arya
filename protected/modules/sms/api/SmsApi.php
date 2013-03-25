<?php

class SmsApi {


	public static function sendSms($to,$body=null,$data=null,$scenario=null,$instant=true){

		if(!$body && !$scenario) {
			throw new CException('Trying to send SMS without body or template.');
		}

		$message = '';

		if($body) {
			$message = $body;
		} else if($scenario) {

			$scenarioModel = SmsTemplates::model()->find('name=:name',array(':name'=>strtoupper($scenario)));
			if($scenarioModel)
				$message = self::translate($scenarioModel->body,$data);
			else
				throw new CException('Scenario/Template not found.');
		}

		$provider = self::getPrimaryProvider();

		if($instant) {
			$provider->send($to,$message);
			return true;
		} else {
			$queue = new SmsQueue();
			$queue->number = $to;
			$queue->body = $message;
			$queue->sent = 0;
			$queue->attempts = 0;
			if($queue->save()) {
				return true;
			} else {
				throw new CException("Could not queue the SMS.");
			}
		}

		return false;

	}

	public static function translate($scenario,$data) {

		$template = array();

		$template["website_url"] = Yii::app()->createAbsoluteUrl('/');
		$template["logo_link"] = Yii::app()->createAbsoluteUrl('/').Yii::app()->theme->baseUrl .'/img/oandz-email.png';
		$template["time"] = date('l jS \of F Y h:i:s A');

		if(is_array($data)){
			foreach($data as $key=>$value){
				if($key=="contact") {
					$template["contact_name"] = $value->name;
					$template["contact_number"] = $value->number;
					$template["contact_email"] = $value->email;
					$template["contact_message"] = $value->message;
					$template["contact_reference"] = $value->reference;
					$template["contact_time"] = $value->time;
					$template["contact_ip"] = $value->ip;
					continue;
				}
				else
					$template[$key] = $value;
				//	if none of the above keys are fetched then, we use the raw string passed from the contact form
				//	with the user-defined assoc index
			}
		}


		return self::changeTemplate($template, $scenario);


	}


	public static function changeTemplate($template,$body){
		foreach($template as $pattern=>$value){
			$body = preg_replace("/\{$pattern\}/",$value, $body);
		}
		return $body;
	}

	public static function getPrimaryProvider(){
		$model = SmsProviders::model()->find('pri = :primary',array(":primary"=>1));
		if($model)
			return $model;
		throw new CException("Primary SMS provider not set.");
	}



	//

















}



?>