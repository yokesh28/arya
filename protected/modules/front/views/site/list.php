
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
				<h2>Visiting Card</h2>
				<div class="row rowsize">

					<div class="product span6">


						<div id="grid" class="main list ">


							<h5>Gloss</h5>
							<div class="view">

								<div class="view-back"></div>
								<img class="imgsize"
									src="<?php echo Yii::app()->baseUrl?>/upload/product/gloss/1.jpg">




								<div class="price">
									<div class="quantityinfo">
										<form id="id1">
											<label><b>Quantity:</b> </label> <select name="quantity"
												onchange="updatePrice('id1');"><option value="500">500nos</option>
												<option value="1000">1000nos</option>

											</select><br> <br> <label><b>Type :</b> </label> <select
												name="type" onchange="updatePrice('id1');"><option
													value="single side">Single Side</option>
												<option value="front & back">Front&Back</option>

											</select> <input type="hidden" name="price" value="500">

										</form>

									</div>


								</div>



							</div>
						</div>
						<div class="isize">
							<input type="image"
								src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
								alt="submit" onClick="addProduct('id1');">
						</div>
					</div>



					<div class="product span6">




						<div id="grid1" class="main list ">
							<h5>Matt</h5>
							<div class="view">
								<div class="view-back"></div>
								<img class="imgsize"
									src="<?php echo Yii::app()->baseUrl?>/upload/product/mat/1.jpeg">




								<div class="price">
									<form id="id2">
										<label><b>Quantity:</b> </label> <select name="quantity1"
											onchange="updatePrice('id2');"><option>500nos</option>
											<option>1000nos</option>

										</select><br> <br> <label><b>Type :</b> </label> <select
											name="type1" onchange="updatePrice('id2');"><option>Single
												Side</option>
											<option>Front&Back</option>
										</select>
									</form>
								</div>


							</div>
						</div>
						<div class="isize">
							<input type="image"
								src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
								alt="submit" onClick="addProduct('id2');">
						</div>

					</div>

					<div class="product span6">




						<div id="grid2" class="main list ">
							<h5>Synthetic</h5>
							<div class="view">
								<div class="view-back"></div>
								<img class="imgsize"
									src="<?php echo Yii::app()->baseUrl?>/upload/product/sy/1.jpg">




								<div class="price">
									<form id="id3">
										<label><b>Quantity:</b> </label> <select name="quantity2"
											onchange="updatePrice('id3');"><option>500nos</option>
											<option>1000nos</option>

										</select><br> <br> <label><b>Type :</b> </label> <select
											name="type2" onchange="updatePrice('id3');"><option>Single
												Side</option>
											<option>Front&Back</option>

										</select>
									</form>

								</div>


							</div>
						</div>
						<div class="isize">
							<input type="image"
								src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
								alt="submit" onClick="addProduct('id3');">
						</div>

					</div>

					<div class="product span6">




						<div id="grid3" class="main list ">
							<h5>Uv</h5>
							<div class="view">
								<div class="view-back"></div>
								<img class="imgsize"
									src="<?php echo Yii::app()->baseUrl?>/upload/product/uv/1.jpg">




								<div class="price">
									<form id="id4">
										<label><b>Quantity:</b> </label> <select name="quantity3"
											onchange="updatePrice('id4');"><option>500nos</option>
											<option>1000nos</option>

										</select><br> <br> <label><b>Type :</b> </label> <select
											name="type3" onchange="updatePrice('id4');"><option>Per Side</option>


										</select>


									</form>
								</div>


							</div>
						</div>
						<div class="isize">
							<input type="image"
								src="<?php echo Yii::app()->theme->baseUrl;?>/images/buy.png"
								alt="submit" onClick="addProduct('id4');">
						</div>

					</div>
				</div>
			</div>
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