
<link
	rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->theme->baseUrl;?>/css/demo.css" />
<link
	rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->theme->baseUrl;?>/css/style_common.css" />
<link
	rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->theme->baseUrl;?>/css/style3.css" />
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic'
	rel='stylesheet' type='text/css' />
<script
	type="text/javascript"
	src="<?php echo Yii::app()->theme->baseUrl;?>/js/modernizr.custom.69142.js"></script>
<body cz-shortcut-listen="true">
	<div id="innerpage">


		<?php include 'header.php'; ?>
	
<div id="content">
				<div class="container imgsize">
					<h2>Sticker</h2>
					<div class="row rowsize">
						<div class="product span6">




							<div id="grid6" class="main list ">
								<h5>Sticker</h5>
								<div class="view">
									<div class="view-back"></div>
									<img class="imgsize"
										src="<?php echo Yii::app()->baseUrl?>/upload/product/sticker/1.jpg">




									<div class="price">
										<form id="id11">
											<label><b>Quantity:</b> </label> <select name="quantity6"
												onchange="updatePrice('id11');">
												<option>1000nos</option>

											</select><br> <br> <label><b>Type :</b> </label> <select
												name="type6" onchange="updatePrice('id11');"><option>5x5</option>

												<option>1000nos</option>
												<option>A4 Size</option>
											</select>


										</form>

									</div>


								</div>
							</div>
							<div class="isize">
								<input type="image"
									src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
									alt="submit" onClick="addProduct('id11');">
							</div>

						</div>

						<div class="product span6">




							<div id="grid7" class="main list ">
								<h5>CD Sticker</h5>
								<div class="view">
									<div class="view-back"></div>
									<img class="imgsize"
										src="<?php echo Yii::app()->baseUrl?>/upload/product/cd/1.jpg">




									<div class="price">
										<form id="id12">
											<label><b>Quantity:</b> </label> <select name="quantity7"
												onchange="updatePrice('id12');">
												<option>1000nos</option>

											</select><br> <br> <label><b>Type :</b> </label> <select
												name="type7" onchange="updatePrice('id12');"><option>5x5</option>

												<option>1000nos</option>
												<option>A4 Size</option>
											</select>



										</form>
									</div>


								</div>
							</div>

							<div class="isize">
								<input type="image"
									src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
									alt="submit" onClick="addProduct('id12');">
							</div>
						</div>


					</div>
				</div>
			</div>
			
		<div id="cart">
	<div class="updatePrice">Total:<span>Rs.0 </span></div>
		<div id="updateitem">
		
		
		
		</div>
		
		
		<div class="checkout">
			<form></form>
			<img
				src="<?php echo Yii::app()->theme->baseUrl;?>/images/checkout.png">
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
				$( '#grid1' ).hoverfold();
				$( '#grid2' ).hoverfold();
				$( '#grid3' ).hoverfold();
				$( '#grid4' ).hoverfold();
				$( '#grid5' ).hoverfold();
				$( '#grid6' ).hoverfold();
				$( '#grid7' ).hoverfold();
				$( '#grid8' ).hoverfold();
				
					}

				}
			});

			function addProduct(temp)
			{
				
				jQuery.ajax({'type':'POST',
					'url':'/front/site/cart',
					'cache':false,
					'data':jQuery('#'+temp).serialize(),
					'success':function(html)
							{
							jQuery('#updateitem').replaceWith(html);
							
							}
				});
				
				jQuery.ajax({'type':'POST',
					'url':'/front/site/price/type/add',
					'cache':false,
					'data':jQuery('#'+temp).serialize(),
					'success':function(html)
							{
							jQuery('.updatePrice span').html(html);
							
							}
				});
				
			}
			
		

			function closeCart(temp,price){
				
			
				
				$(temp).parent().fadeOut();
				$(temp).parent().replaceWith();
				
				jQuery.ajax({'type':'POST',
					'url':'/front/site/price/type/sub/price/'+price,
					'cache':false,
				//	'data':jQuery('#'+temp).serialize(),
					'success':function(html)
							{
							jQuery('.updatePrice span').html(html);
							
							}
				});
				
				return false;
			}
		</script>	
			
			
			
			
			
			
			
			
			
			</div>
			</body>