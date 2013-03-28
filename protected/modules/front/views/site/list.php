<body cz-shortcut-listen="true">
<div id="innerpage">
<div class="logo span3">
			<a href="#"><img
				src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png"> </a>
		</div>
	<?php include 'header.php'; ?>
	<div id="content">
		<div class="container">
			<div class="row-fluid product">
				<?php if($_GET['id']=='1'):?>
				<div class="span3">
					<h3>
						sample
					</h3>
					<a
						href="<?php echo Yii::app()->createAbsoluteUrl('/front/site/productlist/id/')?>"><img
						src="<?php echo Yii::app()->baseUrl?>/upload/product/card.png">
					</a>
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
				
				
				
				<script  
				
					src="<?php echo Yii::app()->theme->baseUrl; ?>/js/paypal-button.min.js?merchant=YOUR_MERCHANT_ID"
					data-button="buynow" data-name="My product" data-amount="1.00"></script>
		
			
		<?php endif;?>
			</div>
		</div>
	</div>
	</div>