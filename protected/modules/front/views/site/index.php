


<body
	id="splash" cz-shortcut-listen="true"  onload="hide_preloader();">

<div id="preloader">
		<div>
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/preloader.png">
		</div>
	</div>


	<div id="homepage" class="row-fluid"  style="display: none" >
		<div class="logo span3">
			<a href="#"><img
				src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png"
				width=100%> </a>





		</div>
		
		<div class="top span12">

			<div class="login offset6"></div>


		</div>
		<div class="rightside">
		
			<button class="btn btn-primary fir" type="button">Register</button>
			<button class="btn btn-primary" type="button">Login</button>
		</div>



		<div id="wowslider-container1">
			<div class="ws_images">
				<ul>
					<li><a
						href="<?php echo  Yii::app()->createAbsoluteUrl('/front/site/list/')?>"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/bg/bss.jpg"
							alt="Fallen tree: jQuery Image Slider HTML" id="wows0" /> </a></li>
					<li><a
						href="<?php echo  Yii::app()->createAbsoluteUrl('/front/site/letter/')?>"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/bg/le.jpg"
							alt="Forest glade : How To Add jQuery Slider To HTML" id="wows1" />
					</a></li>
					<li><a href="<?php echo  Yii::app()->createAbsoluteUrl('/front/site/sticker/')?>"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/bg/st.jpg"
							alt="In the woods : jQuery Div Slider" id="wows2" />rays of light
							show through the trees</a></li>
					<li><a href="<?php echo  Yii::app()->createAbsoluteUrl('/front/site/handout/')?>"><img
							src="<?php echo Yii::app()->theme->baseUrl;?>/bg/ho.jpg"
							alt="The road in the woods : jQuery Slider Div Horizontal"
							id="wows3" /> </a></li>
					
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






