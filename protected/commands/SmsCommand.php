<?php

class SmsCommand extends CConsoleCommand {

	public function actionSend($frequency=55){

		$endTime = time()+$frequency;
		// Check if a previous job has been running for the past 10 minutes.
		if(!DaemonUtils::checkForSync('SMS')){
			DaemonUtils::closeJobForSync('SMS');
			die();
		}

		$job = DaemonUtils::addJob('SMS');

		try{
			$messages = SmsQueue::model()->findAll('sent=:sent',array(':sent'=>'0'));
			$count = 0;
			if(!empty($messages)){
				foreach($messages as $sms){
					if(time()<$endTime){
						if(!$sms->sent){
							// Send Email here
							$result = SmsApi::sendSms($sms->number,$sms->body);
							if($result==1)
							$sms->sent = 1;
							else
							$sms->attempts++;
							$sms->save();
							$count++;
						}
					} else {
						break;
					}
				}
			}
			$message = "$count message(s) were processed.";
			DaemonUtils::endJob($job,$message);
		}catch(Exception $e){
			$message = $e->getMessage();
			DaemonUtils::endJob($job,$message,'ERROR');
		}
	}

}

?>