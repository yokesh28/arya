<?php
class WebUser extends CWebUser{

	public function init()
	{
		parent::init();
		$moduleName = Yii::app()->getController()->getModule()->getName();
		if($moduleName=="admin") {
			$this->loginUrl = Yii::app()->request->baseUrl.'/admin/site/login';			
		} elseif($moduleName=="front") {			
				
		}

	}

	public function getId(){
		return Yii::app()->user->isGuest ? null : Yii::app()->user->id;
	}

	protected function afterLogin($fromCookie){

		if(!$fromCookie){
			$user = User::model()->findByPK(Yii::app()->user->id);
			$user->last_login_time = new CDbExpression('NOW()');
			$user->last_login_ip = SecurityUtils::getRealIp();
			$user->save();
		}

	}
	public function isRole($role){
		if(!$this->getIsGuest()) {
			$result = Assignments::model()->find('LOWER(itemname)=:role AND userid=:id',array(':role'=>strtolower($role),':id'=>$this->getId()));
			if(!empty($result))
				return $result;
			else
				return false;
		}
		else
			return false;
	}

}

?>