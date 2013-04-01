<body cz-shortcut-listen="true">

<div id="innerpage">
	<div class="logo span3">
			<a href="#"><img
				src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo.png"> </a>
		</div>
	<?php include 'header.php'; ?> 



	<div id="content-1">
		<div class="container">
			<div class="row">
				<article class="span12">
					<h2>contact us</h2>
					<figure class="map">
						<iframe
							src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=coimbatore,tamilnadu,india&amp;aq=0&amp;sll=11.010717,76.958359&amp;sspn=11.010717,76.958359&amp;ie=UTF8&amp;hq=&amp;hnear=coimbatore;ll=11.010717,76.958359&amp;spn=11.010717,76.958359&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
					</figure>

				</article>
				<article class="span4">
					<h2 class="h2indent">address</h2>
					<div class="div-adress">
						<address class="adress">

							<strong class="title1"> <h4>Offset Private Limited</h4><br> No.228 A Sakthi Nagar,<br>
							
							Sathy Road,	GanaPathy Post,<br>
							Coimbatore.India.<br>
							</strong> <em> ph: +91 42223233359,2530072<br>Email:
								printatglobal@gmail.com<br> 
							</em> 


						</address>
					</div>

				</article>
				<article class="span8 offset">
					<h2 class="h2indent">get in touch</h2>
					<form name="contactform" id="contact-form"
					>
					
						<div class="success">
							Contact form submitted! <strong>We will be in touch soon.</strong>
						</div>
						<fieldset>
							<div>
								<div class="coll-1">
									<div class="txt-form">Name:</div>

									<label class="name"> <input type="text"  name="name"> <br>
										<span class="error">*This is not a valid name.</span> <span

										class="empty">*This field is required.</span>
									</label>
								</div>
								
								<div class="coll-2">
									<div class="txt-form">Phone:</div>

									<label class="phone"> <input type="tel" name="phone"> <br>
										<span class="error">*This is not a valid phone number.</span>
										<span class="empty">*This field is required.</span>

									</label>
								</div>
								
								<div class="coll-3">
									<div class="txt-form">E-mail:</div>

									<label class="email"> <input type="email" name="email"> <br>
										<span class="error">*This is not a valid email address.</span>
										<span class="empty">*This field is required.</span>

									</label>
								</div>
								
								
								
								
							</div>

							<div class="div-message">
								<div class="txt-form">Message:</div>

								<label class="message"> <textarea name="message"></textarea> <br>
									<span class="error">*The message is too short.</span> <span

									class="empty">*This field is required.</span>
								</label>
							</div>
							<div class="buttons-wrapper">

								<a class="btn btn-1" data-type="submit"  onClick="return validateForm();"  name="submit"  value="Submit"><span>Submit</span></a><span id="response"></span>

							</div>
						</fieldset>
					</form>

				</article>
			</div>

		</div>
	</div>
	

</div>
