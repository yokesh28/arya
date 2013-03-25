<body cz-shortcut-listen="true">
	<?php include 'header.php'; ?>
	<div id="content">
		<div class="container">
			<div class="row-fluid product">
			<?php
			if (!empty($products)):
			
			foreach ($products as $product):
			?>
			<div class="span3">
			<h3><?php echo $product->name;?></h3>
			<a href="#"><img src="<?php echo Yii::app()->baseUrl?>/upload/product/<?php echo $product->img_url;?>"></a>
			<span class="span12">
			<?php echo $product->des;?>
			</span>
			</div>
			<?php endforeach;
			
			endif;
			?>
			 
			</div>
		</div>
	</div>