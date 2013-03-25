<?php

class EmailCommand extends CConsoleCommand {

	public function actionSend($frequency=55){

		$endTime = time()+$frequency;
		// Check if a previous job has been running for the past 10 minutes.
		if(!DaemonUtils::checkForSync('EMAIL')){
			DaemonUtils::closeJobForSync('EMAIL');
			die();
		}

		$job = DaemonUtils::addJob('EMAIL');

		try{
			$emails = EmailQueue::model()->findAll('sent=:sent',array(':sent'=>'0'));
			$count = 0;
			if(!empty($emails)){
				foreach($emails as $email){
					if(time()<$endTime){
						if(!$email->sent){
							// Send Email here
							$result = EmailApi::sendSmtpEmail($email);
							if($result==1)
							$email->sent = 1;
							else {
							$email->attempts++;
							$email->message = $result;
							}
							$email->save();
							$count++;
						}
					} else {
						break;
					}
				}
			}
			$message = "$count email(s) were processed.";
			DaemonUtils::endJob($job,$message);
		}catch(Exception $e){
			$message = $e->getMessage();
			DaemonUtils::endJob($job,$message,'ERROR');
		}
	}

}

?>