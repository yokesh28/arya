

<?php function headerContant($page)
{
	
?>

<header>
		<div class="container">
			<div class="navbar navbar_ clearfix">
				<div class="navbar-inner">
					<div class="clearfix">
						<h1 class="brand">
							<a href="index.php"> <img src="images/logo.png" alt="">
							</a>
						</h1>
						<div class="nav-collapse nav-collapse_ collapse row-fluid ">
							<div class="clearfix">
								<ul class="nav sf-menu clearfix sf-js-enabled ">
									<li <?php echo ($page== 'home' ? 'class=active' : '');?>><a href="index.php">Home</a></li>
									<li <?php echo ($page== 'aboutus' ? 'class=active' : '');?>>
									<a href="about.php">About Us</a>
									</li>
									<li <?php echo ($page== 'product' ? 'class=active' : '');?>><a href="product.php">Product</a></li>
									<li <?php echo ($page== 'service' ? 'class=active' : '');?>><a href="service.php">Services</a></li>
									<li <?php echo ($page== 'carrier' ? 'class=active' : '');?>><a href="carrier.php">Carriers</a></li>
									<li <?php echo ($page== 'contact' ? 'class=active' : '');?>><a href="contact.php">Contact Us</a></li>
								</ul>
								<select class="select-menu" style="display: inline-block;"><option
										value="#">Navigate to...</option>
									<option value="#">Home</option>
									<option value="#">About Us</option>
									<option value="#">Product</option>
									<option value="#">Services</option>
									<option value="#">Carriers</option>
									<option value="#">Contact Us</option>
								</select>
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
	
	<?php }?>