
<link rel="stylesheet"
	href="<?php echo Yii::app()->theme->baseUrl;?>/css/mainstyle.css"
	type="text/css" media="screen">
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->theme->baseUrl;?>/css/style2.css"
	media="screen" />
<script
	type="text/javascript"
	src="<?php echo Yii::app()->theme->baseUrl;?>/js/a.js"></script>
<body
	id="splash" cz-shortcut-listen="true">
	
	
	
	
	<div id="homepage" class="row-fluid">
		<div class="logo span3">
			<a href="#"><img
				src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png"> </a></div>


		<div class="top span12">
		
		<div class="login offset6" >
		<form >
		<div class="label username">
		<input type="text" name="email">
		</div>
		<div class="label password">
		<input type="password" name="email" >
		</div>
		
		<div class="button">
		<input type="submit" name="" value="">
		</div>
		</form>
		
		
		</div>
		
		
		</div>

		<div id="wowslider-container1">
			<div class="ws_images">
				<ul>
					<li><a href="#"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/images/11.png"
							alt="Fallen tree: jQuery Image Slider HTML" 
							id="wows0" /> </a></li>
					<li><a href="#"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/images/22.png"
							alt="Forest glade : How To Add jQuery Slider To HTML"
							 id="wows1" /> </a></li>
					<li><a href="#"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/images/33.png"
							alt="In the woods : jQuery Div Slider" 
							id="wows2" />rays of light show through the trees</a></li>
					<li><a href="#"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/images/44.png"
							alt="The road in the woods : jQuery Slider Div Horizontal"
							 id="wows3" /> </a></li>
					<li><a href="#"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/images/55.png"
							alt="Sapling : jQuery HTML Slider"  id="wows4" />
					</a></li>

				</ul>
			</div>

		</div>
	</div>


	<!--==============================header=================================-->
	<?php include 'header.php'; ?>


	<script type="text/javascript"
		src="<?php echo Yii::app()->theme->baseUrl;?>/js/wowslider.js"></script>
	<script type="text/javascript"
		src="<?php echo Yii::app()->theme->baseUrl;?>/js/script.js"></script>
