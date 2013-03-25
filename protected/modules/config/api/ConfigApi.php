<?php 

class ConfigApi extends Api {
	
	protected $className = 'Config';
	protected $dependency = 'SELECT MAX(updated_time) FROM config';
	
	public function __get($name){
		if (array_key_exists($name, $this->data)) {
			return $this->data[$name];
		} else {
			throw new CHttpException(500,"$this->className with ID $name could not be found");
		}
	}
	
	protected function __construct(){
		if(!empty($this->dependency)) {
			$dependency = new CDbCacheDependency("$this->dependency");
		}
		$model = call_user_func(array("$this->className", 'model'));
	
		if(!empty($dependency)) {
			$results = $model->cache(1000,$dependency)->findAll();
		}
		else {
			$results = $model->findAll();
		}
		foreach($results as $row) {
			$this->data[trim($row->name)] = $row->label;
		}
	}

	public static function model(){
		if(!empty(self::$model) && self::$model instanceof ConfigApi ) {
			return self::$model;
		} else {
			self::$model = new ConfigApi();
			return self::$model;
		}
	}
	
}



?>