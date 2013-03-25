<?php 

class Api {

	protected $data = array();
	protected static $model;
	protected $recent;

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
			$this->data[trim($row->id)] = $row;
		}
	}

	public function __get($name){
		if (array_key_exists($name, $this->data)) {
			return $this->data[$name];
		} else {
			throw new CHttpException(500,"$this->className with ID $name could not be found");
		}
	}

	public function getAll(){
		return $this->data;
	}

	public function update($model,$attributes){
		if($model->hasAttribute('updated_time')) {
			$model->updated_time = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss',time());
		}
		if($model->hasAttribute('updated_by')) {
			$model->updated_by = Yii::app()->user->isGuest ? null : Yii::app()->user->id;
		}
		$model->attributes = $attributes;
		$model->save();
		return $model;
	}

	public function create($model,$attributes){
		if($model->hasAttribute('created_time')) {
			$model->created_time = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss',time());
		}
		if($model->hasAttribute('created_by')) {
			$model->created_by = Yii::app()->user->isGuest ? null : Yii::app()->user->id;
		}
		$model->attributes = $attributes;
		$model->save();
		return $model;
	}

	public function delete($model){
		if($model instanceof $this->className)
			return $model->delete();
		else
			throw new CHttpException(500,'Cannot delete a model of class '.get_class($model));
	}

	public function getLatest($recentAttribute,$count=1){

		if(empty($this->recent)) {
			$data = $this->getAll();
			$date = array();
			foreach($data as $key=>$row){
				$date[$key] = $row->$recentAttribute;
			}
			array_multisort($date,SORT_DESC,$data);
			
			$this->recent = $data;
		}

		return array_slice($this->recent,0,$count);
	}


}