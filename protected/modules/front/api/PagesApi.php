<?php 

class PagesApi {
	
	private $data = array();
	private static $model;
	
	private function __construct(){
		$dependency = new CDbCacheDependency('SELECT MAX(updated_time) FROM pages');
		$results = Pages::model()->cache(1000,$dependency)->findAll();
		foreach($results as $row) {
			$this->data[trim($row->name)] = $row;
		}
	}
	
	public function __get($name){
		if (array_key_exists($name, $this->data)) {
			return $this->data[$name];
		} else {
			$page = explode('_', $name);
			if(isset($page[0]) && array_key_exists($page[0].".*", $this->data))
				return $this->data[$page[0].".*"];
			else
				return false;
		}
	}
	
	public static function model(){
		if(!empty(self::$model) && self::$model instanceof PagesApi ) {
			return self::$model;
		} else {
			self::$model = new PagesApi();
			return self::$model;
		}
	}
	

	
}

?>