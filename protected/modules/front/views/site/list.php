
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style3.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/modernizr.custom.69142.js"></script> 

	
	
	
	
	

<body cz-shortcut-listen="true">
<div id="innerpage">
<div class="logo span3">
			<a href="#"><img
				src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png" > </a>
		</div>
	<?php include 'header.php'; ?>
	<div id="content">
		<div class="container">
			<div class="row-fluid product list">
				<?php if($_GET['id']=='1'):?>
				<div class="span3">
					<h3 >
						sample
					</h3>
					
					
					
					<a
						href="<?php echo Yii::app()->createAbsoluteUrl('/front/site/productlist/id/')?>"></a>
						
			
			

            <div id="grid" class="main">
				<div class="view">
					<div class="view-back">
						
						<a href="http://www.flickr.com/photos/ag2r/5439506585/in/photostream">Pay</a>
					</div>
						<img  src="<?php echo Yii::app()->baseUrl?>/upload/product/card.png">
					
					
					
					
					<div class="price">
						<label><b>Price :</b></label> <select><option>500</option>
						<option>1000</option>
						<option>1500</option>
						<option>2000</option>
						<option>2500</option>
						</select>
						</span>
					
					<div class="text span12"><p>This card is a special card</p>
					</div>
					
					
					</div>
					
					
					</div>
			</div>
				
				
				

		
			
		<?php endif;?>
			</div>
		</div>
	</div>
	</div>
	</div>
	
	 
		<script type="text/javascript">	
			
			Modernizr.load({
				test: Modernizr.csstransforms3d && Modernizr.csstransitions,
				yep : ['http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js','<?php echo Yii::app()->theme->baseUrl;?>/js/hoverfold.js'],
				nope: 'css/fallback.css',
				callback : function( url, result, key ) {
						
					if( url === '<?php echo Yii::app()->theme->baseUrl;?>/js/hoverfold.js' ) {
				$( '#grid' ).hoverfold();
					}

				}
			});
				
		</script>
   
	
	
	
	
	
