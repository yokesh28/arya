<?php
class BulkEmailForm extends CFormModel {
	
	public $fromEmail;
	public $fromName;
	public $toList;
	public $cc;
	public $bcc;
	public $subject;
	public $bodyHtml;
	public $bodyPlain;

	public function setUserList(){
		
		switch($this->toList) {
			
			case 'agents':
				
				break;
				
			case 'builders':
				
				break;
					
			case 'individuals':
					
				break;
				
			default:
				
				break;
			
			
		}
		
	}
	
	
	
}