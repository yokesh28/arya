	<header>
		<div class="container">
			<div class="navbar navbar_ clearfix">
				<div class="navbar-inner">
					<div class="clearfix">
						<h1 class="brand">
							<a href="<a href="<?php echo Yii::app()->CreateAbsoluteUrl('/home')?>"> <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png" alt="">
							</a>
						</h1>
						<div class="nav-collapse nav-collapse_ collapse row-fluid ">
							<div class="clearfix">
								<ul class="nav sf-menu clearfix sf-js-enabled  ">
									<li <?php echo (Yii::app()->controller->action->id== 'index' ? 'class=active' : '');?>><a href="<?php echo Yii::app()->CreateAbsoluteUrl('/home')?>">Home</a></li>
									<li <?php echo (Yii::app()->controller->action->id== 'about' ? 'class=active' : '');?>>
									<a href="<?php echo Yii::app()->CreateAbsoluteUrl('/about')?>">About Us</a>
									</li>
									<li <?php echo (Yii::app()->controller->action->id== 'product' ? 'class=active' : '');?>><a href="<?php echo Yii::app()->CreateAbsoluteUrl('/product')?>">Product</a></li>
									<li <?php echo (Yii::app()->controller->action->id== 'service' ? 'class=active' : '');?>><a href="<?php echo Yii::app()->CreateAbsoluteUrl('/service')?>">Services</a></li>
									<li <?php echo (Yii::app()->controller->action->id== 'career' ? 'class=active' : '');?>><a href="<?php echo Yii::app()->CreateAbsoluteUrl('/career')?>">Career</a></li>
									<li <?php echo (Yii::app()->controller->action->id== 'contact' ? 'class=active' : '');?>><a href="<?php echo Yii::app()->CreateAbsoluteUrl('/contact')?>">Contact Us</a></li>
							
								</ul>
								
								<div class="div-search">
									<span>search</span>
									<form id="search" action="#" method="GET"
										accept-charset="utf-8">
										<input type="text" value="" name="s"> <a href="#"
											onclick="document.getElementById('search').submit()"></a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
