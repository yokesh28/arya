
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
					<h2>Letter Heads</h2>
					<div class="row rowsize">

						<div class="product span6">




							<div id="grid4" class="main list ">
								<h5>Letter Head</h5>
								<div class="view">
									<div class="view-back"></div>
									<img class="imgsize"
										src="<?php echo Yii::app()->baseUrl?>/upload/product/letterhead/1.jpg">




									<div class="price">
										<form id="id9">
											<label><b>Quantity:</b> </label> <select name="quantity4"
												onchange="updatePrice('id9');"><option>500nos</option>
												<option>1000nos</option>

											</select><br> <br> <label><b>Type :</b> </label> <select
												name="type4" onchange="updatePrice('id9');"><option>Single
													Side</option>
												<option>extra</option>
												<option>Per Side</option>
												<option>Knurling</option>
												<option>envelope</option>

											</select>


										</form>

									</div>


								</div>
							</div>
							<div class="isize">
								<input type="image"
									src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
									alt="submit" onClick="addProduct('id9');">
							</div>

						</div>



						<div class="product span6">




							<div id="grid5" class="main list ">
								<h5>Pad Charges</h5>
								<div class="view">
									<div class="view-back"></div>
									<img class="imgsize"
										src="<?php echo Yii::app()->baseUrl?>/upload/product/pad/1.jpg">




									<div class="price">
										<form id="id10">
											<label><b>Quantity:</b> </label> <select name="quantity5"
												onchange="updatePrice('id10');"><option>10pads</option>


											</select><br> <br> <label><b>Type :</b> </label> <select
												name="type5" onchange="updatePrice('id10');"><option>Single
													Side</option>
												<option>extra</option>
												<option>Per Side</option>
												<option>Knurling</option>
												<option>envelope</option>

											</select>



										</form>
									</div>


								</div>
							</div>
							<div class="isize">
								<input type="image"
									src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
									alt="submit" onClick="addProduct('id10');">
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