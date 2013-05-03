

	<div class="menu">
		<div class="navbar navbar_ clearfix">
			<div class="navbar-inner">
			<?php if(Yii::app()->controller->action->id!= 'index'):?>
				<a class="span2 logo" href="<?php echo Yii::app()->CreateAbsoluteUrl('/home')?>" ><img class="span12 "
					src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png"> </a>
					<?php endif;?>
				<div class="row-fluid">
					<div class="clearfix span10">
						<div class=" nav-collapse nav-collapse_ collapse row-fluid ">
							<div class="clearfix">
								<ul class="nav sf-menu clearfix sf-js-enabled  head span12">

									<li class="span2"
									<?php echo (Yii::app()->controller->action->id== 'index' ? 'class=active' : '');?>><a
										href="<?php echo Yii::app()->CreateAbsoluteUrl('/home')?>">Home</a>
									</li>
									<li class="span2"
									<?php echo (Yii::app()->controller->action->id== 'about Us' ? 'class=active' : '');?>>
										<a href="<?php echo Yii::app()->CreateAbsoluteUrl('/about')?>">About Us
											</a>
									</li>
									<li class="span2"
									<?php echo (Yii::app()->controller->action->id== 'product' ? 'class=active' : '');?>><a
										href="<?php echo Yii::app()->CreateAbsoluteUrl('/product')?>">Product</a>
									</li>
									<li class="span2"
									<?php echo (Yii::app()->controller->action->id== 'service' ? 'class=active' : '');?>><a
										href="<?php echo Yii::app()->CreateAbsoluteUrl('/service')?>">Services</a>
									</li>
									<li class="span2"
									<?php echo (Yii::app()->controller->action->id== 'career' ? 'class=active' : '');?>><a
										href="<?php echo Yii::app()->CreateAbsoluteUrl('/career')?>">Career</a>
									</li>
									<li class="span2"
									<?php echo (Yii::app()->controller->action->id== 'contact' ? 'class=active' : '');?>><a
										href="<?php echo Yii::app()->CreateAbsoluteUrl('/contact')?>">Contact
											Us</a></li>
                                          
											
								  
								</ul>

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

