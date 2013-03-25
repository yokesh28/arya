<?php 

class SiteController extends FrontController {

	public function actionIndex() {
		
	
		$page = 'HOME';

		$this->render('index');
	}

	public function actionPortfolio(){

		$projects = PortfolioApi::getProjects();
		$categories = PortfolioApi::getCategories();

		$this->breadcrumbs = array(
				'Home',
				array('Portfolio'=>$this->createUrl('/front/site/portfolio')),
		);

		$this->render('portfolio',array('projects'=>$projects,'categories'=>$categories));
	}

	public function actionAbout(){

		$this->breadcrumbs = array('Home',array('About'=>$this->createUrl('/front/site/about')));

		$this->render('about');
	}
	public function actionCareers(){
	
		$this->breadcrumbs = array(
				'Home',
				array('Careers'=>$this->createUrl('/front/site/careers')),
		);
	
		$this->render('about');
	}
	public function actionService(){
	
		$this->breadcrumbs = array(
				'Home',
				array('Service'=>$this->createUrl('/front/site/service')),
		);
	
		$this->render('about');
	}

	public function actionContact($ref='DIRECT'){

		$config = ConfigApi::model();

		$this->breadcrumbs = array(
				'Home',
				array('Contact'=>$this->createUrl('/front/site/contact')),
		);

		$model = new ContactForm();

		if(isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			$model->ref = $ref;
			if($model->validate()) {
				$model->process();
				Yii::app()->user->setFlash('success','Thanks for contacting us. We will get back to you shortly (usually within 12 hours)');
				if(!$model->hasErrors()) {
					$model = new ContactForm();
				}
			}
		}

		$this->render('contact',array('config'=>$config,'model'=>$model));
	}

	public function actionError()
	{

		$config = ConfigApi::model();

		if($error=Yii::app()->errorHandler->error)
		{

			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else {

				$data['error'] = $error;

				if(!YII_DEBUG && $error["code"]!="404") {
					EmailApi::createEmail($config->DEVELOPER_EMAIL,'APPLICATION.ERROR',$data,false,false,false,false,false);
				}

				$this->render('error', array('config'=>$config,'error'=>$error));
			}
		}
	}


}


?>
