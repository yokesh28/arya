<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catagories-form',
	'enableAjaxValidation'=>false,
		
		'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
		),
		
		
		
)); ?>

    
    
    
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'image_url'); ?>
        <?php echo CHtml::activeFileField($model, 'image_url'); ?>  // by this we can upload image
        <?php echo $form->error($model,'image_url'); ?>
    </div>
       

    <div class="row">
		<?php echo $form->labelEx($model,'updated_time'); ?>
		<?php echo $form->textField($model,'updated_time'); ?>
		<?php echo $form->error($model,'updated_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->