<?php

class EmailApi {


	private static $_smtp;

	/* This is a static function to initialize default value for From Email */
	static function getSmtp(){

		if(!self::$_smtp){

			require_once('Mail.php');
			require_once('Mail/mime.php');

			$host = Yii::app()->params["smtpHostName"];
			$username = Yii::app()->params["smtpUserName"];
			$password = Yii::app()->params["smtpPassword"];

			self::$_smtp = Mail::factory('smtp',
					array ('host' => $host,
							'auth' => true,
							'port' => Yii::app()->params["smtpPort"],
							'username' => $username,
							'password' => $password,
							'persist'  => true,

					));
		}

		return self::$_smtp;
	}

	public static function createEmail($to, $scenario=false, $data=false, $bodyHtml=false, $cc=false, $bcc=false, $subject = false, $instant=true ) {

		$template = self::getTemplate($data);

		if($scenario) {
			$model = EmailTemplates::model()->find('name=:name',array(':name'=>$scenario));

			if(!$model)
				throw new CException("Scenario not found.");
			$bodyHtml = self::changeTemplate($template,$model->body_html);
			$bodyPlain = self::changeTemplate($template,$model->body_plain);
			$fromName = $model->from_name;
			$fromEmail = $model->from_email;
			$subject = $model->subject;

		} elseif($bodyHtml) {
			$bodyHtml = self::changeTemplate($template,$bodyHtml);
			$bodyPlain = self::changeTemplate($template,$bodyHtml);
			$fromName = Yii::app()->params['adminEmail'];
			$fromEmail = Yii::app()->params['adminName'];
		} else {
			throw new CException("Invalid Email Usage.");
		}


		if($instant){
			$result = self::sendSmtpEmail(false,$fromName,$fromEmail,$to,$cc,$bcc,$subject,$bodyHtml,$bodyPlain);
			if($result == 1)
				return true;
			else
				throw new CException($result);
		} else {
			$queue = new EmailQueue();
			$queue->from_email = $fromEmail;
			$queue->from_name = $fromName;
			$queue->to = $to;
			$queue->cc = $cc;
			$queue->bcc = $bcc;
			$queue->subject = $subject;
			$queue->body_html = $bodyHtml;
			$queue->body_plain = $bodyPlain;
			$queue->attempts = 0;
			$queue->sent = 0;
			$queue->save();			
		}

		return false;
	}

	private static function getTemplate($data){

		$template = array();

		$template["website_url"] = Yii::app()->createAbsoluteUrl('/');
		$template["logo_link"] = Yii::app()->createAbsoluteUrl('/').Yii::app()->theme->baseUrl .'/img/oandz-email.png';
		$template["time"] = date('l jS \of F Y h:i:s A');

		if($data) {
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
					else if($key=="error") {
						$template["error_type"] = $value["type"];
						$template["error_message"] = $value["message"];
						$template["error_file"] = $value["file"];
						$template["error_line"] = $value["line"];
						$template["error_trace"] = $value["trace"];
						//	$template["error_source"] = $value["source"];
						continue;
					}
					else if($key=="requirement"){
						$requirement=Requirement::model()->findByPk($value);
						//$template["contact_name"] = $contact->name;
					}
				}

			}
		}

		return $template;
	}

	/* public static function sendEmail($to,$scenario,$data="",$cc="",$bcc="",$instant=false){
		$model = EmailTemplateApi::getTemplateByScenario($scenario);
	$template = array();

	if($model){
	$template["home_link"] = Yii::app()->createAbsoluteUrl('/');
	$template["signin_link"] = Yii::app()->createAbsoluteUrl('/account');
	$template["logo_link"] = Yii::app()->createAbsoluteUrl('/').Yii::app()->theme->baseUrl .'/images/logo-newsletter.jpg';



	$htmlEmail = self::changeTemplate($template,$model->body_html);
	$plainEmail = self::changeTemplate($template,$model->body_plain);
	$emailData["from_email"] = $model->from_email;
	$emailData["from_name"] = $model->from_name;
	$emailData["subject"] = self::changeTemplate($template,$model->subject);
	$emailData["body_html"] = $htmlEmail;
	$emailData["body_plain"] = $plainEmail;
	return EmailQueueApi::addToQueue($to,$cc,$bcc,"",$emailData);
	}

	return false;
	} */

	public static function changeTemplate($template,$body){
		foreach($template as $pattern=>$value){
			$body = preg_replace("/\{$pattern\}/",$value,$body);
		}
		return $body;
	}

	public static function sendSmtpEmail($email=false, $fromName = false, $fromEmail = false, $to = false, $cc = false, $bcc = false, $subject = false, $bodyHtml = false, $bodyPlain = false){

		require_once('Mail.php');
		require_once('Mail/mime.php');

		$crlf = "\n";
		$mime = new Mail_mime($crlf);


		if($email) {

			$mime->setHTMLBody($email->body_html);
			$body = $mime->get();

			$smtpHeaders = array ('From' => $email->from_email,
					'To' => $email->to,
					'Cc' => $email->cc,
					'Bcc' => $email->bcc,
					'Subject' => $email->subject);


			$smtp = self::getSmtp();
			$smtpHeaders = $mime->headers($smtpHeaders);
			$mail = $smtp->send($email->to, $smtpHeaders, $body);

		} else {

			$mime->setHTMLBody($bodyHtml);
			$body = $mime->get();

			$smtpHeaders = array ('From' => $fromEmail,
					'To' => $to,
					'Cc' => $cc,
					'Bcc' => $bcc,
					'Subject' => $subject);


			$smtp = self::getSmtp();
			$smtpHeaders = $mime->headers($smtpHeaders);
			$mail = $smtp->send($to, $smtpHeaders, $body);
		}

		if (PEAR::isError($mail)) {
			return $mail->getMessage();
		} else {
			return 1;
		}

	}


}



?>
