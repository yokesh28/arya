<body cz-shortcut-listen="true">
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
						<label>Price:</label> <span>500
						</span>
					</div>
					<span class="span12">Sample card
					</span>
				</div>
				<script
					src="<?php echo Yii::app()->theme->baseUrl; ?>/js/paypal-button.min.js?merchant=YOUR_MERCHANT_ID"
					data-button="buynow" data-name="My product" data-amount="1.00"></script>
			
		<?php endif;?>
			</div>
		</div>
	</div>