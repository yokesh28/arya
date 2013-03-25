

<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us</title>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
<meta name="description" content="Your description">
<meta name="keywords" content="Your keywords">
<meta name="author" content="Your name">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css"
	media="screen">
<link rel="stylesheet" href="css/responsive.css" type="text/css"
	media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css"
	media="screen">
<script type="text/javascript"
	src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/jquery.mobilemenu.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>



<!--[if lt IE 8]>
    		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
   	<![endif]-->
<!--[if lt IE 9]>
      <link rel="stylesheet" href="css/docs.css" type="text/css" media="screen">
      <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
	<!--==============================header=================================-->
	<?php include("header.php");
	echo headerContant('contact');
	?>

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
	<?php require('footer.php')?>


		<script type="text/javascript">
function validateForm()
{

var contactname=document.forms["contactform"]["name"].value;


var contactemail=document.forms["contactform"]["email"].value;
var atpos=contactemail.indexOf("@");
var dotpos=contactemail.lastIndexOf(".");
var contactnumber = document.forms["contactform"]["phone"].value;
if (contactname==null || contactname=="")
  {
  alert(" Name must be filled out");
  return false;
  }
else if (contactnumber==null || contactnumber=="")
 {
	 alert("MobileNo must be filled out");
	 return false;
 }       

else if(isNaN(contactnumber)|| contactnumber.indexOf(" ")!=-1)
{
         			alert("Enter numeric value");
		return false;
           }
else if (contactnumber.length > 10 || contactnumber.length < 10 )
		{
           			alert("enter 10 characters"); 
			return false;
     			 }
else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=contactemail.length)
{
	  alert("Not a valid e-mail address");
	  return false;
	  }
  
$.ajax({
	type : "post",
	url : "mail.php",
	cache : false,
	data : $('#contact-form').serialize(),
	success : function(json) {
			$('#response').html(json);
		

	
	},
	
});

return false;












}
</script>


	<script type="text/javascript" src="js/bootstrap.js"></script>
	<meta name="viewport"
		content="width=device-width,initial-scale=1.0,user-scalable=0">

	<!--LIVEDEMO_00 -->

	<script type="text/javascript">
 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7078796-5']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();</script>


	<div id="shadowMeasureIt"></div>
	<div id="divCoordMeasureIt"></div>
	<div id="divRectangleMeasureIt">
		<div id="divRectangleBGMeasureIt"></div>
	</div>
</body>
</html>