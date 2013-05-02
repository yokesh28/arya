
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
					<h2>Hand Outs</h2>
					<div class="row rowsize">

						<div class="product span6">




							<div id="grid8" class="main list ">

								<div class="view">
									<div class="view-back"></div>
									<img class="imgsize"
										src="<?php echo Yii::app()->baseUrl?>/upload/product/hand/1.jpg">




									<div class="price">
										<form id="id13">
											<label><b>Quantity:</b> </label> <select name="quantity8">
												<option>1000nos</option>

											</select><br> <br> <label><b>Type :</b> </label> <select
												name="type8" onchange="updatePrice('id13');"><option>SingleSide</option>
												<option>front&back</option>

											</select><br> <br> <label><b>Size :</b> </label><select
												name="size" onchange="updatePrice('id13');"><option>170gsm -
													210x280mm</option>
												<option>100gsm - 210 x 280mm</option>
												<option>170 Gsm - 140 x 210mm</option>
												<option>100Gsm - 140 x 210mm</option>
												<option>220 Gsm - 210 x 280mm</option>
												<option>100gsm - 210 x 280mm</option>

											</select>

										</form>

									</div>


								</div>
							</div>

							<div class="isize hand">
								<input type="image"
									src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
									alt="submit" onClick="addProduct('id13');">
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