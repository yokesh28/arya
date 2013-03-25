<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>

<!-- Basic Page Needs
  =============================================== -->
<meta charset="utf-8">

<!-- Page Titles
  =============================================== -->
<title>
<?php echo $this->page ? $this->page->title : '';?>
</title>
<?php require_once('lib/analytics.php'); ?>

</head>
<body>

	<!-- Start Wrapper -->
	<div id="wrapper">

		<?php echo $content;?>

	</div>
	<!-- End Wrapper -->



</body>
</html>
