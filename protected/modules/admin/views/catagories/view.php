<?php
$this->breadcrumbs=array(
	'Catagories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Catagories', 'url'=>array('index')),
	array('label'=>'Create Catagories', 'url'=>array('create')),
	array('label'=>'Update Catagories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Catagories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Catagories', 'url'=>array('admin')),
);
?>

<h1>View Catagories #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'image_url',
		'updated_time',
	),
)); ?>
