<!-- Start Content -->
<section id="content"
	class="container contact-full">

	<div id="map-canvas"></div>
	<!-- End Map Canvas -->

	<div class="columns one-half contact-form">

		<?php
		foreach(Yii::app()->user->getFlashes() as $key => $message) {
			if($key=="success")
				echo '<div class="info-box raptor">' . $message . "</div>\n";
		}
		?>
		<h4>Get In Touch</h4>
		<span class="dropcap1 color">Enquiry? Feedback? Coffee?</span>
		<p>We would love to hear from you.</p>
		<ul class="contact2-info">
			<li><i class="icon-location"></i>#54, Bharathi Park 7th cross,
				Saibaba Colony, Coimbatore - 641038</li>
			<li><i class="icon-phone"></i>+91 422 4202684</li>
			<li><i class="icon-mail"></i>hello at oandz dot in</li>
		</ul>
		<!-- End Contact Information -->

		<hr class="divider1">
		<!-- Divider -->

		<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'contact-form',
				'enableAjaxValidation'=>false,
		)); ?>
		<h4>Send Us A Message</h4>

		<label for="name">Name</label> 
		<input type="text" name="ContactForm[name]" id="name" class="name required" value="<?php echo $model->name;?>">
		
		<label for="mail">Email</label>		
		<input type="text" name="ContactForm[email]" id="mail" class="email required" value="<?php echo $model->email;?>">
		
		<label for="mail">Number</label>
		<input type="text" name="ContactForm[number]" id="number" class="number required" value="<?php echo $model->number;?>">
		
		
		<label for="message">Message</label>
		<textarea name="ContactForm[message]" cols="30" rows="5" id="message"
			class="message required"><?php echo $model->message;?></textarea>

		<button type="submit" class="submit">SUBMIT</button>
		
		<?php if($model->hasErrors()):?>
		
		<?php if($model->hasErrors('name')):?>
		<div class="info-box red">
			<?php echo $model->getError('name');?>
		</div>
		<?php endif;?>

		<?php if($model->hasErrors('email')):?>
		<div class="info-box red">
			<?php echo $model->getError('email');?>
		</div>
		<?php endif;?>

		<?php if($model->hasErrors('message')):?>
		<div class="info-box red">
			<?php echo $model->getError('message');?>
		</div>
		<?php endif;?>

		<?php if($model->hasErrors('number')):?>
		<div class="info-box red">
			<?php echo $model->getError('number');?>
		</div>
		<?php endif;?>

		<?php endif;?>

		<?php $this->endWidget(); ?>
		<!-- End Contact Form -->

	</div>

</section>
<!-- End Content -->
<?php Yii::app()->clientScript->registerScriptFile("http://maps.google.com/maps/api/js?sensor=false");?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl."/js/jquery.gmap.min.js",CClientScript::POS_END);?>

<?php Yii::app()->clientScript->registerScript("gMapsCall",'jQuery(document).ready(function($){

		// 15 Google Map for Contact 1
		if ($("#map-canvas").length && jQuery()) {

		$("#map-canvas").gMap({
		panControl: true,             //The pan control displays buttons for panning the map.
		scaleControl: true,           //The scale control displays a map scale element.
		scrollwheel: false,           //Set to false to disable zooming with your mouses scrollwheel.
		latitude: ' . $config->CONTACT_GMAPS_CENTER_LAT . ',          //Point on which the viewport will be centered.
		longitude: ' . $config->CONTACT_GMAPS_CENTER_LNG . ',       //Point on which the viewport will be centered
		controlsPositions: {          //Positions of default controls.
		zoom: google.maps.ControlPosition.TOP_RIGHT,
		pan: google.maps.ControlPosition.TOP_RIGHT,
		streetView: google.maps.ControlPosition.TOP_RIGHT,
		scale: google.maps.ControlPosition.TOP_RIGHT
},
		markers: [{                   //List of points to be marked on the map
		latitude: ' . $config->CONTACT_GMAPS_MARKER_LAT . ',        //Point on the map where the marker will be drawn
		longitude: ' . $config->CONTACT_GMAPS_MARKER_LNG . ',    //Point on the map where the marker will be drawn
		html: "<b>Ones and Zeros Technologies Private Limited</b>"
		/* Content that will be shown within the info window for this marker. If empty no info window will be shown when the user clicks the marker.  */
}],
		icon: {                       //Subset of properties for defining a custom marker image for all markers.
		image: "'.Yii::app()->theme->baseUrl.'/img/gmap_pin.png",  //Full path to a image that indicates the marker on the map.
		iconsize: [44, 54],         //A simple array of integer values for width and height valid for "image".
		iconanchor: [22, 54],       //The pixel coordinate relative to the top left corner of the icon image at which this icon is anchored to the map.
		infowindowanchor: [22, 0]   //The pixel coordinate relative to the top left corner of the icon image at which the info window is anchored to this icon.
},
		zoom: ' . $config->CONTACT_GMAPS_ZOOM . ',                      //Zoom value from 1 to 19 where 19 is the greatest and 1 the smallest.
});
}

});
',CClientScript::POS_END); ?>
