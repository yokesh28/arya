<?php

class ProductsController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//admin/column2';

	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Products;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$rnd = rand(0,9999);
			$model->attributes=$_POST['Products'];
			$uploadedFile=CUploadedFile::getInstance($model,'image');
			$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
			$model->img_url = $fileName;
			if($model->save())
				$uploadedFile->saveAs(Yii::app()->basePath.'/../products/'.$fileName);  // image will uplode to rootDirectory/banner/
			 $this->redirect(array('admin'));
		}

		
		
	$this->render('create',array(
				'model'=>$model,
		));
		
		
		
	}

	
	
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			
			
			
			$_POST['Products']['image'] = $model->image;
			$model->attributes=$_POST['Products'];
			
			$uploadedFile=CUploadedFile::getInstance($model,'image');
			
			if($model->save())
			{
				if(!empty($uploadedFile))  // check if uploaded file is set or not
				{
					$uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$model->image);
				}
				$this->redirect(array('admin'));
			}
			
			
			
			//	$this->redirect(array('view','id'=>$model->id));
			
			
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Products');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		// page size drop down changed
		if (isset($_GET['pageSize'])) {
	    	Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
	    	unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
	
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
