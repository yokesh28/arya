<?php
/**
 * SBaseController is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends Controller

{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//default/main';	

	
	public $pageName;
	public $page;

	public $breadcrumbs = array();
	

 	public function init(){
 		 		
		$this->pageName = $this->parsePageName();
		$method = $this->pageName;
		$this->page = PagesApi::model()->$method;
	} 
	
	public function parsePageName(){
		$uri = false;
		$uri = substr(Yii::app()->request->requestUri,1);
		if(!$uri)
			return 'HOME';
		else {
			$result = explode('/', $uri);
			return strtoupper(implode('_', $result));
		}
	}

	
}