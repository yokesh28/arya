	<body cz-shortcut-listen="true">
	<?php include 'header.php'; ?>
	<div id="content">
		<div class="container">
			<div class="row-fluid product">
			<?php 
			if(!empty($catgories)):
			foreach ($catgories as $cat):?>
			<div class="span3">
			<h3><?php echo $cat->name;?></h3>
			<a href="<?php echo  Yii::app()->createAbsoluteUrl('/front/site/list/id/'.$cat->id)?>"><img src="<?php echo Yii::app()->baseUrl?>/upload/cat/<?php echo $cat->image_url;?>"></a>
			<span class="span12">
			<?php echo $cat->des;?>
			</span>
			</div>
			<?php endforeach;
			endif;
			?>
			
			</div>
		</div>
	</div>