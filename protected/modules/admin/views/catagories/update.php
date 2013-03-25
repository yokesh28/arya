<?php
$this->breadcrumbs=array(
	'Catagories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Catagories', 'url'=>array('index')),
	array('label'=>'Create Catagories', 'url'=>array('create')),
	array('label'=>'View Catagories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Catagories', 'url'=>array('admin')),
);
?>

<h1>Update Catagories <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>