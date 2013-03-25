<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/docs.css" type="text/css"
	media="screen">
<title>Home</title>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl;?>/images/favicon.ico">
<meta charset="utf-8">

<meta name="description" content="Your description">
<meta name="keywords" content="Your keywords">
<meta name="author" content="Your name">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.css" type="text/css"
	media="screen">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/responsive.css" type="text/css"
	media="screen">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css" type="text/css"
	media="screen">

<meta name="viewport"
	content="width=device-width,initial-scale=1.0,user-scalable=0">




<!-- Page Titles
  =============================================== -->
<title><?php echo $this->page ? $this->page->title : '';?></title>
<?php require_once('lib/analytics.php'); ?>
<?php require_once 'lib/jscript.php';?>

</head>




	<?php echo $content;?>

	
	<?php if(Yii::app()->controller->action->id!='home'):?>
	
	<?php include 'lib/footer.php';?>
	<?php endif;?>
	
	<script type="text/javascript">


	$('.sf-menu').mobileMenu();
	</script>




	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.js"></script>





</body>
</html>
