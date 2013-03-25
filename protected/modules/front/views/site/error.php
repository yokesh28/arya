<!-- Start Content -->
<section id="content" class="container add-top add-bottom">

	<div class="columns twelve first text-center">
		<?php if($error["code"]=="404") {?>
		<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/404.png" alt="Error 404" id="error-404"
			class="add-bottom add-top">

		<h3 class="add-bottom">It seems the page you were looking for has moved
			or is no longer there.</h3>
		<?php } elseif($error["code"]=="500"){?>
		<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/500.png" alt="Error 500" id="error-404"
			class="add-bottom add-top">
		<h3 class="add-bottom">Oopsie. We didn't mean to.</h3>
		<?php }?>
			
		<?php if(YII_DEBUG):?>		
		<div class="columns twelve first">
		<?php echo $error['message'];?>
		</div>		
		<?php endif;?>
		<div class="columns twelve first">
			<a href="<?php echo Yii::app()->createAbsoluteUrl('/');?>" class="button">GO TO HOMEPAGE</a>
		</div>

	</div>

</section>
<!-- End Content -->
