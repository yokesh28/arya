

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
	echo headerContant('carrier');
	
	?>

	
	
	
	<div class="container">
  <div class="row-fluid">
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span4 offset4">
    
   <h1> Coming Soon</h1>
     
    </div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    <div class="span12"></div>
    
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
