<?php
$this->breadcrumbs=array(
	'Catagories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Catagories', 'url'=>array('index')),
	array('label'=>'Create Catagories', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('catagories-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>

<h1>Manage Catagories</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'catagories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'image_url',
		'updated_time',
		array(
		    'class'=>'CButtonColumn',
	    	'header'=>CHtml::dropDownList('pageSize',$pageSize,array(20=>20,50=>50,100=>100),array(
	        	'onchange'=>"$.fn.yiiGridView.update('catagories-grid',{ data:{pageSize: $(this).val() }})",
	    	)),
		),
	),
)); ?>
