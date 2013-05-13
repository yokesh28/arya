

<body cz-shortcut-listen="true">

	<div id="innerpage">
		
		<?php include 'header.php'; ?>


		
		
		
		<div class="container">


			
         <h5>Our Services</h5>

		<div class="row-fluid color">
				<ul class="inline">

		
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Annual Reports</h6>
					<br>
				</li>

				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/10.png">
					<h6>Art Books</h6>
					<br>
				</li>
				
				<li>
				
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/11.png">
					<h6>Brochures</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/12.png">
					<h6>Calendars</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/13.png">
					<h6>Carry Bags</h6>
					<br>
					</li>
					
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/14.png">
					<h6>Catalogues</h6>
					<br>

				</li>
		
				<li>

					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/15.png">
					<h6>Coffee Table Books</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/16.png">
					<h6>Corporate Stationary</h6>
					<br>
				</li>
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/17.png">
					<h6>Hardcase Books</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Journals</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Labels</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Leaflets</h6>
					<br>
				</li>
       
         <li>

					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Magazines</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Packaging Cartons</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Posters</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Presentation Folders</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Visual Aids</h6>
					<br>
				</li>
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/services/1.png">
					<h6>Invitation Cards</h6>
					<br>
				</li>
				
				</ul>
		

</div>



		</div>

</div>
		<script type="text/javascript">
	
	// On window load. This waits until images have loaded which is essential
	$(window).load(function(){
		
		// Fade in images so there isn't a color "pop" document load and then on window load
		$(".color img").fadeIn(500);
		
		// clone image
		$('.color img').each(function(){
			var el = $(this);
			el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"998","opacity":"0"}).insertBefore(el).queue(function(){
				var el = $(this);
				el.parent().css({"width":this.width,"height":this.height});
				el.dequeue();
			});
			this.src = grayscale(this.src);
		});
		
		// Fade image 
		$('.color img').mouseover(function(){
			$(this).parent().find('img:first').stop().animate({opacity:1}, 1000);
		})
		$('.img_grayscale').mouseout(function(){
			$(this).stop().animate({opacity:0}, 1000);
		});		
	});
	
	// Grayscale w canvas method
	function grayscale(src){
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');
		var imgObj = new Image();
		imgObj.src = src;
		canvas.width = imgObj.width;
		canvas.height = imgObj.height; 
		ctx.drawImage(imgObj, 0, 0); 
		var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
		for(var y = 0; y < imgPixels.height; y++){
			for(var x = 0; x < imgPixels.width; x++){
				var i = (y * 4) * imgPixels.width + x * 4;
				var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
				imgPixels.data[i] = avg; 
				imgPixels.data[i + 1] = avg; 
				imgPixels.data[i + 2] = avg;
			}
		}
		ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
		return canvas.toDataURL();
    }
	    
</script>




	
</body>
