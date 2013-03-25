<?php 

class FaqApi extends Api {

	protected $className = 'Faq';
	protected $dependency = 'SELECT MAX(updated_time) FROM faq';

	public static function model(){
		if(!empty(self::$model) && self::$model instanceof FaqApi ) {
			return self::$model;
		} else {
			self::$model = new FaqApi();
			return self::$model;
		}
	}

	public function getAll($category,$priority=true){

		$result = false;
		if($priority) {
			$pri = array();
			foreach($this->data as $key=>$faq) {
				if(strtolower($faq->category) == strtolower($category)){
					$result[$key] = $faq;
					$pri[$key] = $faq->priority;
				}				
			}
			if($result)
			array_multisort($pri, SORT_DESC, $result);
			
		} else {	
			foreach($this->data as $faq) {
				if(strtolower($faq->category) == strtolower($category)){
					$result[] = $faq;
				}
			}
		}

		return $result;
	}

}


?>